<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules\Inside\Http\Models;

use App\MyCore\Models\DbTable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;



class Users extends DbTable implements AuthenticatableContract{
  use Authenticatable;
  
    public $primaryKey = 'id';

    public function __construct($options = array()) {
        parent::__construct($options);

        $this->table = 'users';
        $this->fillable = ['is_deleted'];

        $this->filters = array(
            'is_deleted_filter' => "is_deleted",
        );
        $this->searchs = array(
            'email_search' => 'users.email',
        );
        $this->sorts = array(
            'email_sort' => 'users.email',
            'date_created_sort' => 'groups.date_created'
        );

        $this->params = \Request::all();
    }
}
