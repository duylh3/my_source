<?php
/**
 * Created by PhpStorm.
 * User: duylh
 * Date: 12/27/2016
 * Time: 2:19 PM
 */

namespace Modules\Inside\Http\Controllers;



use App\MyCore\Routing\MyController;
use Modules\Inside\Http\Models\Categories;
use Modules\Inside\Http\Requests\CategoriesRequest;


class CategoriesController extends MyController
{
    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'categories';
        $this->_model = new Categories();
    }
    public function getShowAll(){
        $this->data['paginate'] = $this->_model->showAll()->paginate(PAGE_LIST_COUNT);

        return view("inside::{$this->data['controllerName']}.show-all", $this->buildDataView($this->data));
    }
    public function getAdd(){
        return view("inside::{$this->data['controllerName']}.add", $this->buildDataView($this->data));
    }
    public function postAdd(CategoriesRequest $request){
        if ($this->_model->add($request)){
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }


}