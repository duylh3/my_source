<?php
namespace Modules\Inside\Http\Requests;


class ArticlesRequest extends Request
{
    private $_languages = array();

    public function __construct()
    {
        $this->_languages = json_decode(LANGUAGES);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = array();
        $data["title"] = 'required';

        return $data;
    }

    public function messages()
    {
        $data = array();
        $data["title.required"] = 'Vui lòng nhập tiêu đề';

        return $data;
    }
}