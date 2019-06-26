<?php

namespace Modules\Outside\Http\Models;


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
            ])->get()->toArray();
        
        return $select;
    
    }   
}