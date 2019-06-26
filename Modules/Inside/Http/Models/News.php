<?php
/**
 * Created by PhpStorm.
 * User: duylh
 * Date: 12/29/2016
 * Time: 3:03 PM
 */

namespace Modules\Inside\Http\Models;


use App\MyCore\Models\DbTable;
use Modules\Inside\Http\Requests\NewsRequest;

class News extends DbTable
{
    public $primaryKey = 'news_id';
    public function __construct($options = array())
    {
        parent::__construct($options);

        $this->table = 'news';
        $this->searchs = array(
            'title_search' => "news.title",
        );
        $this->sorts = array(
            'title_sort' => "title",
            'date_created_sort' => "date_created",
            'date_modified_sort' => "date_modified",
        );
        $this->params = \Request::all();
    }
    public function showAll()
    {
        $select = News::select('categories.category_name', $this->table . '.*')
            ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
            ->where([
                'categories.is_deleted' => 0,
                'news.is_deleted' => 0
            ]);
        return $this->generateSelect($select);
    }

    public function add(NewsRequest $request){
        $object = new News();

        $data = $request->all();
        $data = $this->_formatDataToSave($data);

        $this->filterColumns($data, $object);
        $object->save();

        $id = $object->{$object->primaryKey};

        return $id;
    }
    public function edit($id, NewsRequest $request)
    {
        $object = $this->findOrNew($id);

        $data = $request->all();
        $data = $this->_formatDataToSave($data);
        $this->filterColumns($data, $object);

        $object->save();

        return $id;
    }
    private function _formatDataToSave($data)
    {
        if (isset($data['_token']))
            unset($data['_token']);

//        if (strlen($data['image_name'])) {
//            $img = explode('/', $data['image_name']);
//            $data['image_name'] = end($img);
//        }

        return $data;
    }
}