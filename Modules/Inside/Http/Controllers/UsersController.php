<?php

namespace Modules\Inside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Inside\Http\Models\Users;
use Modules\Inside\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends MyController {

    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách user';
        $this->data['controllerName'] = 'users';
        $this->_model = new Users();
    }

    public function getLogin() {
        return view("inside::{$this->data['controllerName']}.login", $this->buildDataView($this->data));
    }
    
    public function postLogin(UserLoginRequest $request){
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {         
            return redirect("/inside");
        }
        return redirect("/inside/users/login");
    }

}
