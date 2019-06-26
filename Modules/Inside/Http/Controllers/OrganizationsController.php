<?php

namespace Modules\Inside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Inside\Http\Models\Organizations;
use Modules\Inside\Http\Requests\OrganizationsRequest;

class OrganizationsController extends MyController {

    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'organizations';
        $this->_model = new Organizations();
    }

    public function getShowAll() {
        $this->data['paginate'] = $this->_model->showAll()->paginate(PAGE_LIST_COUNT);

        return view("inside::{$this->data['controllerName']}.show-all", $this->buildDataView($this->data));
    }

    public function getAdd() {
        return view("inside::{$this->data['controllerName']}.add", $this->buildDataView($this->data));
    }

    public function postAdd(OrganizationsRequest $request) {
        if ($this->_model->add($request)) {
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }

    public function getEdit($id) {

        $this->data['object'] = $this->_model->findOrNew($id);
        return view("inside::{$this->data['controllerName']}.edit", $this->buildDataView($this->data));
    }
    
    public function postEdit($id, OrganizationsRequest $request){
        if ($this->_model->edit($id, $request)){
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }

    /**
     * @param $id
     * @description Xóa bài viết
     * @author duylh3
     */
    public function postDelete($id){
        $this->_model->remove($id);
    }

}
