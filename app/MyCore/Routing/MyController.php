<?php

namespace App\MyCore\Routing;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;

class MyController extends Controller {

    public $data = array();
    public $request = null;
    public $configs = array();
    public $api     = null;

    public $controllerName = null;
    public $actionName = null;

    public function __construct($options = array()) {
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);

        $this->controllerName = $controller;
        $this->actionName = $action;

        if (\Auth::user() != null)
        {
            $this->userId = \Auth::user()->user_id;
            $this->data['emailUser'] = \Auth::user()->email;
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
