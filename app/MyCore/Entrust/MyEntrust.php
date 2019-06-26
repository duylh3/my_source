<?php namespace App\MyCore\Entrust;

/**
 * This class is the main entry point of entrust. Usually this the interaction
 * with this class will be done through the Entrust Facade
\
 */

use Illuminate\Support\Facades\Auth;

class MyEntrust
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    
    /**
     * Checks if the current user has a role by its name
     *
     * @param string $name Group name.
     *
     * @return bool
     *
     * @author Nhàn Nguyen
     */

    public static function hasGroup($group, $requireAll = false){
        if($user = self::user()){
            return $user->hasGroup($group,$requireAll);
        }
        return false;
    }

    /**
     * Checks if the current user has a role by its name
     *
     * @param string $name Role name.
     *
     * @return bool
     * @author nhannv9
     */
    public static function hasRole($role, $requireAll = false)
    {
        if ($user = self::user()) {
            return $user->hasRole($role, $requireAll);
        }

        return false;
    }

    /**
     * Check if the current user has a permission by its name
     *
     * @param string $permission Permission string.
     *
     * @return bool
     *
     * @author Nhàn Nguyen
     */
    public static function can($permission, $requireAll = false)
    {
        if ($user = self::user()) {
            return $user->can($permission, $requireAll);
        }

        return false;
    }


    /**
     * Get the currently authenticated user or null.
     *
     * @return Illuminate\Auth\UserInterface|null
     * @author Nhàn Nguyen
     */
    public static function user()
    {
        return Auth::user();
    }

    /**
     * Check if the current user has a groups or role or permission by its name
     *
     * @param array|string $groups            The group(s) needed.
     * @param array|string $roles            The role(s) needed.
     * @param array|string $permissions      The permission(s) needed.
     * @param array $options                 The Options.
     *
     * @return bool
     * @author Nhan Nguyen
     */
    public static function ability($group = array(), $roles = array() , $permissions = array(), $options = [])
    {
        if ($user = self::user()) {
            return $user->ability($group, $roles, $permissions, $options);
        }

        return false;
    }
}
