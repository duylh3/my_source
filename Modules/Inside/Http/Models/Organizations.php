<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules\Inside\Http\Models;

use App\MyCore\Models\DbTable;
use Modules\Inside\Http\Requests\OrganizationsRequest;
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
        $this->searchs = array(
            'organizations_name_search' => "organizations.organizations_name",
        );
        $this->sorts = array(
            'organizations_name_sort' => "organizations.organizations_name",
            'date_created_sort' => "date_created",
            'date_modified_sort' => "date_modified",
        );
        $this->params = \Request::all();
    }

    public function showAll() {
        $select = Organizations::select($this->table . '.*')->where([
            $this->table . '.is_deleted' => 0
        ]);

        return $this->generateSelect($select);
    }

    public function add(OrganizationsRequest $request) {
        $object = new Organizations();

        $data = $request->all();
        $data = $this->_formatDataToSave($data);

        $this->filterColumns($data, $object);
        $object->save();

        $id = $object->{$object->primaryKey};

        return $id;
    }

    public function edit($id, OrganizationsRequest $request) {
        $object = $this->findOrNew($id);

        $data = $request->all();

        $data = $this->_formatDataToSave($data);
        $this->filterColumns($data, $object);

        $object->save();

        return $id;
    }

    private function _formatDataToSave($data) {
        if (isset($data['_token']))
            unset($data['_token']);

        if (strlen($data['image_name'])) {
            $img = explode('/', $data['image_name']);
            $data['image_name'] = end($img);
        }

        return $data;
    }

}
