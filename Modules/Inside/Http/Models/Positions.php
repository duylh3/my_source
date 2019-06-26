<?php
/**
 * Created by PhpStorm.
 * User: duylh
 * Date: 12/29/2016
 * Time: 3:03 PM
 */

namespace Modules\Inside\Http\Models;


use App\MyCore\Models\DbTable;
use Modules\Inside\Http\Requests\PositionsRequest;

class Positions extends DbTable
{
    public $primaryKey = 'position_id';
    public function __construct($options = array())
    {
        parent::__construct($options);

        $this->table = 'positions';
        $this->searchs = array(
            'position_name_search' => "positions.position_name",
        );
        $this->sorts = array(
            'position_name_sort' => "position_name",
            'date_created_sort' => "date_created",
            'date_modified_sort' => "date_modified",
        );
        $this->params = \Request::all();
    }
    public function showAll()
    {
        $select = Positions::select($this->table . '.*')
            ->where([
                'positions.is_deleted' => 0
            ]);
        return $select;
    }
    public function add(PositionsRequest $request){
        $object = new Positions();

        $data = $request->all();
        $data = $this->_formatDataToSave($data);

        $this->filterColumns($data, $object);
        $object->save();

        $id = $object->{$object->primaryKey};

        return $id;
    }
    public function edit($id, PositionsRequest $request)
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

        if (strlen($data['image_name'])) {
            $img = explode('/', $data['image_name']);
            $data['image_name'] = end($img);
        }

        return $data;
    }
}