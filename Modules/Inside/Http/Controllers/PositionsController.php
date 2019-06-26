<?php

namespace Modules\Inside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Inside\Http\Models\Positions;
use Modules\Inside\Http\Requests\PositionsRequest;

class PositionsController extends MyController {

    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'positions';
        $this->_model = new Positions();
    }

    public function getShowAll() {
        $this->data['paginate'] = $this->_model->showAll()->paginate(PAGE_LIST_COUNT);

        return view("inside::{$this->data['controllerName']}.show-all", $this->buildDataView($this->data));
    }

    public function getAdd() {
        return view("inside::{$this->data['controllerName']}.add", $this->buildDataView($this->data));
    }

    public function postAdd(PositionsRequest $request) {
        if ($this->_model->add($request)) {
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }

    public function getEdit($id) {
        $this->data['object'] = $this->_model->findOrNew($id);
        return view("inside::{$this->data['controllerName']}.edit", $this->buildDataView($this->data));
    }

    /**
     * @param $id
     * @param DistrictsRequest $request
     * @return Redirect
     * @author duylh
     * @description Chỉnh sửa bài viết
     * @method post
     */
    public function postEdit($id, PositionsRequest $request) {
       // dd($request);
        if ($this->_model->edit($id, $request)) {
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }
    public function postDelete($id){
        $this->_model->remove($id);
    }
}
