<?php

namespace Modules\Inside\Http\Controllers;

use App\MyCore\Inside\Routing\MyController;

class StaticController extends MyController {

    private $_model = null;
    private $_params = array();
    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title']          = 'Static';
        $this->data['controllerName'] = 'static';
    }

    public function getCk() {
        return view("inside::{$this->data['controllerName']}.ck", $this->buildDataView($this->data));
    }
}
