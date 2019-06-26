<?php

namespace App\MyCore\Inside\Routing;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use ClassPreloader\Config;
use App\Http\Models\Api;

class MyController extends Controller {

    public $data = array();
    public $request = null;
    public $configs = array();

    public $controllerName = null;
    public $actionName = null;

    public function __construct($options = array()) {
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);

        $this->controllerName = $controller;
        $this->actionName = $action;


        /***
         * Login
         *
         */
//        if (!Auth::check())
//        {
//            if ($controller != 'UsersController' && $action != 'getLogin')
//            {
//                header('Location: /users/login');
//                exit();
//            }
//            if ($controller == 'UsersController' && $action != 'getLogin' && $action != 'postLogin')
//            {
//                header('Location: /users/login');
//                exit();
//            }
//        }

        if (Auth::user() != null)
        {
            $this->userId = Auth::user()->user_id;
            $this->data['emailUser'] = Auth::user()->email;
            $this->data['userType'] = Auth::user()->user_type;
        }
    }

    /**
     * push data xuống view
     *
     * @return mixed
     * @author Giau Le
     */
    public function buildDataView($data = array()) {
        extract($data);
        return call_user_func_array('compact', array_keys($data));
    }

}
