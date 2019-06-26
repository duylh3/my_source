<?php

namespace Modules\Outside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Outside\Http\Models\Organizations;

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
        $this->data['intros'] = $this->_model->showAll();

        return view("outside::{$this->data['controllerName']}.show-all", $this->buildDataView($this->data));
    }
        public function getDetail($id) {
        $this->data['object'] = $this->_model->findOrNew($id);

        return view("outside::{$this->data['controllerName']}.detail", $this->buildDataView($this->data));
    }
}
