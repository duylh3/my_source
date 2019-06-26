<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules\Outside\Http\Models;

use App\MyCore\Models\DbTable;

/**
 * Description of Organizations
 *
 * @author duylh
 */
class Organizations extends DbTable {

    public $primaryKey = 'organization_id';

    public function __construct($options = array()) {
        parent::__construct($options);

        $this->table = 'organizations';
//        $this->searchs = array(
//            'organizations_name_search' => "organizations.organizations_name",
//        );
//        $this->sorts = array(
//            'organizations_name_sort' => "organizations.organizations_name",
//            'date_created_sort' => "date_created",
//            'date_modified_sort' => "date_modified",
//        );
        $this->params = \Request::all();
    }

    public function showAll() {
        $select = Organizations::select($this->table . '.*')->where([
                    $this->table . '.is_deleted' => 0
                ])
                ->get();

        return $select;
    }

}
