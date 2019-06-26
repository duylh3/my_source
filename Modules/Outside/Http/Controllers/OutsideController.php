<?php

namespace Modules\Outside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Outside\Http\Models\Articles;

class OutsideController extends MyController {

    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['controllerName'] = 'outside';
        $this->_model = new Articles();
    }

    public function getIndex() {
        $this->data['articles'] = $this->_model->showAll();
        
        $this->data['news'] = $this->_model->showNews();
        $this->data['firstNew'] = $this->data['news'][0];
        
        return view("outside::index", $this->buildDataView($this->data));
    }

}
