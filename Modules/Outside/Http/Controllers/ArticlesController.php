<?php

namespace Modules\Outside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Outside\Http\Models\Articles;
use Modules\Outside\Http\Models\Positions;

class ArticlesController extends MyController {

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

    public function getShowAll() {
        $this->data['paginate'] = $this->_model->showAll()->paginate(PAGE_LIST_COUNT);

        return view("outside::{$this->data['controllerName']}.show-all", $this->data);
    }

    public function getDetail($id) {
        $this->data['object'] = $this->_model->findOrNew($id);

        return view("outside::{$this->data['controllerName']}.detail", $this->buildDataView($this->data));
    }

    public function getIntro() {
        $this->data['intros'] = $this->_model->showIntro();

        return view("outside::{$this->data['controllerName']}.show-intro", $this->data);
    }

    public function getNewsImages() {
        $this->data['newsImages'] = $this->_model->showNewsImages();

        return view("outside::{$this->data['controllerName']}.show-news-images", $this->data);
    }

    public function getContact() {
        $this->data['contact'] = $this->_model->getContact();

        return view("outside::{$this->data['controllerName']}.contact", $this->data);
    }

    public function getAbout() {
        $this->data['about'] = $this->_model->getAbout();

        return view("outside::{$this->data['controllerName']}.about", $this->data);
    }

    public function getPosition() {
        $this->data['position'] = $this->_model->getPosition();
        $modelPosition = new Positions();
        $data = $modelPosition->showAll();
        foreach ($data as $item) {
            if ($item['position_name'] == 'Ban Thường Vụ') {
                $this->data['btv'][] = $item;
            }
            if ($item['position_name'] == 'BCH') {
                $this->data['bch'][] = $item;
            }
        }
        return view("outside::{$this->data['controllerName']}.position", $this->data);
    }

    public function getNews() {
        $this->data['news'] = $this->_model->getNews();

        return view("outside::{$this->data['controllerName']}.news", $this->data);
    }

    public function getNewsDetail($id) {
        $this->data['object'] = $this->_model->findOrNew($id);

        return view("outside::{$this->data['controllerName']}.news-detail", $this->buildDataView($this->data));
    }

}
