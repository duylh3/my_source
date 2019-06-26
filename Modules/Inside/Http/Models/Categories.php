<?php

namespace Modules\Inside\Http\Models;

use App\MyCore\Models\DbTable;
use Modules\Inside\Http\Requests\CategoriesRequest;

class Categories extends DbTable
{
    public $primaryKey = 'category_id';
    public function __construct($options = array())
    {
        parent::__construct($options);

        $this->table = 'categories';
        $this->searchs = array(
            'category_name_search' => "categories.category_name",
        );
        $this->sorts = array(
            'category_name_sort' => "category_name",
            'date_created_sort' => "date_created",
            'date_modified_sort' => "date_modified",
        );
        $this->params = \Request::all();
    }
    public function showAll()
    {
        $select = Categories::select($this->table . '.*')
            ->where([
                'categories.is_deleted' => 0,
            ]);
        return $this->generateSelect($select);
    }

    public function add(CategoriesRequest $request){
        $object = new Categories();

        $data = $request->all();
        $data = $this->_formatDataToSave($data);

        $this->filterColumns($data, $object);
        $object->save();

        $id = $object->{$object->primaryKey};

        return $id;
    }
    public function getCategories() {
        return Categories::select()
            ->where('is_deleted', '=', 0)->get();
    }
    private function _formatDataToSave($data)
    {
        if (isset($data['_token']))
            unset($data['_token']);
        return $data;
    }
}