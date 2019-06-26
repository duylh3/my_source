<?php 

namespace Modules\Inside\Http\Requests;

use Modules\Inside\Http\Requests\Request;

class UserLoginRequest extends Request {

    private $_languages = array();
    public function __construct() {
        $this->_languages = json_decode(LANGUAGES);
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $data = array();
        $data["email"] = 'required|email';
        $data["password"] = 'required';
        return $data;
    }

    public function messages () {
        $data = array();
        $data["email.required"] = 'Vui lòng nhập email';
        $data["email.email"] = 'Vui lòng nhập email';
        $data["password.required"] = 'Vui lòng nhập mật khẩu';
        return $data;
    }
}