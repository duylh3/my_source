<?php namespace App\MyCore\Entrust\Traits;

/**
 * This file is part of Entrust,
 * a group & permission management solution for Laravel.
 *
 */

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;

trait MyEntrustGroupTrait
{
    //Big block of caching functionality.
    public function cachedRoles()
    {
        $groupPrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_groups_for_role_'.$this->$groupPrimaryKey;
        return Cache::tags(Config::get('entrust.group_role_table'))->remember($cacheKey, Config::get('cache.ttl'), function () {
            return $this->roles()->get();
        });
    }
    public function save(array $options = [])
    {   //both inserts and updates
        $result = parent::save($options);
        Cache::tags(Config::get('entrust.group_role_table'))->flush();
        return $result;
    }
    public function delete(array $options = [])
    {   //soft or hard
        $result = parent::delete($options);
        Cache::tags(Config::get('entrust.group_role_table'))->flush();
        return $result;
    }
    public function restore()
    {   //soft delete undo's
        $result = parent::restore();
        Cache::tags(Config::get('entrust.group_role_table'))->flush();
        return $result;
    }
    /**
     * Many-to-Many ralation with the group model
     * @author Nhan Nguyen
     */

    public function roles(){
        return $this->belongsToMany(Config::get('entrust.role'), Config::get('entrust.group_role_table'));
    }
    /**
     * Many-to-Many relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Config::get('auth.model'), Config::get('entrust.group_user_table'),Config::get('entrust.group_foreign_key'),Config::get('entrust.user_foreign_key'));
    }
    /**
     * Boot the group model
     * Attach event listener to remove the many-to-many records when trying to delete
     * Will NOT delete any records if the group model uses soft deletes.
     *
     * @return void|bool
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function($group) {
            if (!method_exists(Config::get('entrust.group'), 'bootSoftDeletes')) {
                $group->users()->sync([]);
                $group->roles()->sync([]);
            }

            return true;
        });
    }
    
    /**
     * Checks if the group has a permission by its name.
     *
     * @param string|array $name       Permission name or array of permission names.
     * @param bool         $requireAll All permissions in the array are required.
     *
     * @return bool
     */
    public function hasPermission($name, $requireAll = false)
    {
        if (is_array($name)) {
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);

                if ($hasPermission && !$requireAll) {
                    return true;
                } elseif (!$hasPermission && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the permissions were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the permissions were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->cachedPermissions() as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Save the inputted permissions.
     *
     * @param mixed $inputPermissions
     *
     * @return void
     */
    public function savePermissions($inputPermissions)
    {
        if (!empty($inputPermissions)) {
            $this->perms()->sync($inputPermissions);
        } else {
            $this->perms()->detach();
        }
    }

    /**
     * Attach permission to current group.
     *
     * @param object|array $permission
     *
     * @return void
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Detach permission from current group.
     *
     * @param object|array $permission
     *
     * @return void
     */
    public function detachRole($role)
    {
        if (is_object($role))
            $role = $role->getKey();

        if (is_array($role))
            $role = $role['id'];

        $this->roles()->detach($role);
    }

    /**
     * Attach multiple permissions to current group.
     *
     * @param mixed $permissions
     *
     * @return void
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Detach multiple permissions from current group
     *
     * @param mixed $permissions
     *
     * @return void
     */
    public function detachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }
}
