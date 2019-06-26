<?php
use App\MyCore\Routing\MyController;
use Modules\Outside\Http\Models\Articles;

namespace Modules\Outside\Http\Controllers;

class ContactController extends MyController{
        private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'articles';
        $this->_model = new Articles();
    }
}
