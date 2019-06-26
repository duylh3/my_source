<?php
namespace Modules\Inside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Inside\Http\Models\News;
use Modules\Inside\Http\Models\Categories;
use Modules\Inside\Http\Requests\ArticlesRequest;


class NewsController extends MyController
{
    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'news';
        $this->_model = new News();
    }
    public function getShowAll(){
        $this->data['paginate'] = $this->_model->showAll()->paginate(PAGE_LIST_COUNT);

        return view("inside::{$this->data['controllerName']}.show-all", $this->buildDataView($this->data));
    }
    public function getAdd(){
        $this->data['categories'] = (new Categories())->getCategories();
        return view("inside::{$this->data['controllerName']}.add", $this->buildDataView($this->data));
    }
    public function postAdd(NewsRequest $request){
        if ($this->_model->add($request)){
            return redirect("inside/{$this->data['controllerName']}/show-all");
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author duylh3
     * @description Chỉnh sửa bài viết
     * @method get
     */
    public function getEdit($id){
        $this->data['categories'] = (new Categories())->getCategories();
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
    public function postEdit($id, ArticlesRequest $request){
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