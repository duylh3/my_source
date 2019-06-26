<?php namespace App\MyCore\Entrust\Traits;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 */

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;

trait MyEntrustUserTrait
{

    /**
     * 
     * Nhan nguyen
     */

    public function cachedGroups(){
        $userPrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_group_for_user_'.$this->$userPrimaryKey;
        return Cache::tags(Config::get('entrust.group_user_table'))->remember($cacheKey, Config::get('cache.ttl'), function () {
            return $this->groups()->get();
        });
    }

    /**
     * Many-to-Many relations with Group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Nhan Nguyen
     */
    public function groups()
    {
        return $this->belongsToMany(Config::get('entrust.group'), Config::get('entrust.group_user_table'), Config::get('entrust.user_foreign_key'), Config::get('entrust.group_foreign_key'));
    }

    public function save(array $options = [])
    {   //both inserts and updates
        $result = parent::save($options);
        Cache::tags(Config::get('entrust.group_user_table'))->flush();
        return $result;
    }
    public function delete(array $options = [])
    {   //soft or hard
        $result = parent::delete($options);
        Cache::tags(Config::get('entrust.group_user_table'))->flush();
        return $result;
    }
    public function restore()
    {   //soft delete undo's
        $result = parent::restore();
        Cache::tags(Config::get('entrust.group_user_table'))->flush();
        return $result;
    }


    /**
     * Boot the user model
     * Attach event listener to remove the many-to-many records when trying to delete
     * Will NOT delete any records if the user model uses soft deletes.
     *
     * @return void|bool
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            if (!method_exists(Config::get('auth.model'), 'bootSoftDeletes')) {
                $user->groups()->sync([]);
            }

            return true;
        });
    }
    /**
     * Checks if the user has a group by its name.
     *
     * @param string|array $name       Role name or array of role names.
     * @param bool         $requireAll All roles in the array are required.
     *
     * Nhan Nguyen
     * @return bool
     */

    public function hasGroup($name, $requireAll = false)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasGroup = $this->hasGroup($roleName);

                if ($hasGroup && !$requireAll) {
                    return true;
                } elseif (!$hasGroup && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the roles were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the roles were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->cachedGroups() as $group) {
                if ($group->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }
    /**
     * Checks if the user has a role by its name.
     *
     * @param string|array $name       Role name or array of role names.
     * @param bool         $requireAll All roles in the array are required.
     *
     * Nhan nguyen
     * @return bool
     */

    public function hasRole($role,  $requireAll = false){
        if(is_array($role)){
            foreach ($role as $roleName) {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && !$requireAll) {
                    return true;
                } elseif (!$hasRole && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the roles were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the roles were found.
            // Return the value of $requireAll;
            return $requireAll;
        }else{
            foreach ($this->cachedGroups() as $group){
                foreach ($group->cachedRoles() as $roleObj) {
                    if ($roleObj->name == $role) {
                        return true;
                    }
                }
            }
        }
    }

    /**
     * Check if user has a permission by its name.
     *
     * @param string|array $permission Permission string or array of permissions.
     * @param bool         $requireAll All permissions in the array are required.
     *
     * @return bool
     * @author nhannv9
     */
    public function can($permission, $requireAll = false)
    {
        if (is_array($permission)) {
            foreach ($permission as $permName) {
                $hasPerm = $this->can($permName);

                if ($hasPerm && !$requireAll) {
                    return true;
                } elseif (!$hasPerm && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the perms were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the perms were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->cachedGroups() as $group){
                foreach ($group->cachedRoles() as $role) {
                    foreach ($role->cachedPermissions() as $perm) {
                        if (str_is( $permission, $perm->name) ) {
                            return true;
                        }
                    }
                }
            }


        }

        return false;
    }

    /**
     * @param mixed $group
     *
     * @author Nhan Nguyen
     * attact method group
     */
    public function attachGroup($group){
        if(is_object($group)){
            $group = $group->getKey();
        }

        if(is_array($group)){
            $group = $group['id'];
        }

        $this->groups()->attach($group);
    }
    /**
     * @param mixed $group
     *
     * @author Nhan Nguyen
     * attact method group
     */

    public function detachGroup($group){
        if (is_object($group)) {
            $group = $group->getKey();
        }

        if (is_array($group)) {
            $group = $group['id'];
        }

        $this->groups()->detach($group);
    }


    /**
     * Nhan Nguyen
     * attact groups
     */


    public function attachGroups($groups){
        foreach ($groups as $group){
            $this->attachGroup($group);
        }
    }

    /**
     * Nhan Nguyen
     * detact muti group to user
     */


    public function detachGroups($groups){
        foreach ($groups as $group){
            $this->detachGroup($group);
        }
    }

    /**
     * Checks group(s), role(s) and permission(s).
     *
     * @param string|array $groups       Array of roles or comma separated string
     * @param string|array $roles       Array of roles or comma separated string
     * @param string|array $permissions Array of permissions or comma separated string.
     * @param array        $options     validate_all (true|false) or return_type (boolean|array|both)
     *
     * @throws \InvalidArgumentException
     *
     * @return array|bool
     * Nhan nguyen
     */
    public function ability($groups = array(), $roles = array(), $permissions = array(), $options = [])
    {
        // Convert string to array if that's what is passed in.
        if (!is_array($groups)) {
            $groups = explode(',', $groups);
        }
        if (!is_array($roles)) {
            $roles = explode(',', $roles);
        }
        if (!is_array($permissions)) {
            $permissions = explode(',', $permissions);
        }

        // Set up default values and validate options.
        if (!isset($options['validate_all'])) {
            $options['validate_all'] = false;
        } else {
            if ($options['validate_all'] !== true && $options['validate_all'] !== false) {
                throw new InvalidArgumentException();
            }
        }
        if (!isset($options['return_type'])) {
            $options['return_type'] = 'boolean';
        } else {
            if ($options['return_type'] != 'boolean' &&
                $options['return_type'] != 'array' &&
                $options['return_type'] != 'both') {
                throw new InvalidArgumentException();
            }
        }

        // Loop through groups , roles and permissions and check each.
        $checkGroups = [];
        $checkedRoles = [];
        $checkedPermissions = [];
        foreach ($groups as $group) {
            $checkGroups[$group] = $this->hasGroup($group);
        }
        foreach ($roles as $role) {
            $checkedRoles[$role] = $this->hasRole($role);
        }
        foreach ($permissions as $permission) {
            $checkedPermissions[$permission] = $this->can($permission);
        }

        // If validate all and there is a false in either
        // Check that if validate all, then there should not be any false.
        // Check that if not validate all, there must be at least one true.
        if(($options['validate_all'] && !(in_array(false,$checkedRoles) || in_array(false,$checkedPermissions) || in_array(false,$checkGroups))) ||
            (!$options['validate_all'] && (in_array(true,$checkedRoles) || in_array(true,$checkedPermissions) || in_array(true,$checkGroups)))) {
            $validateAll = true;
        } else {
            $validateAll = false;
        }

        // Return based on option
        if ($options['return_type'] == 'boolean') {
            return $validateAll;
        } elseif ($options['return_type'] == 'array') {
            return ['groups' => $checkGroups, 'roles' => $checkedRoles, 'permissions' => $checkedPermissions];
        } else {
            return [$validateAll, ['groups' => $checkGroups,'roles' => $checkedRoles, 'permissions' => $checkedPermissions]];
        }

    }

}
