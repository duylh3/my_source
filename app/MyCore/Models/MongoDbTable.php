<?php

namespace App\MyCore\Models;
use Jenssegers\Mongodb\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MongoDbTable extends Eloquent
{
    protected $connection = 'mongodb';
    /**
     * Enter description here ...
     * @param unknown $select
     * @return unknown
     * @author Giau Le
     */
    public function generateSelect($select) {
        if (count($this->params)) {
            if (isset($this->params['search_type']) && isset($this->params['search_keyword']) && strlen($this->params['search_type']) && strlen($this->params['search_keyword'])) {
                if ($this->params['search_type'] === 'ALL') {
                    /**
                     * search all
                     */
                    if (count($this->searchs)) {
                        $conditions = array();
                        $select->where(function($query) {
                            foreach ($this->searchs as $search) {
                                $query->orWhere($search, 'like', "%{$this->params['search_keyword']}%");
                            }
                        });
                    }
                } else {
                    $select->where($this->searchs[$this->params['search_type']], 'like', "%{$this->params['search_keyword']}%");
                }
            }
            foreach ($this->params as $paramKey => $paramValue) {
                if (in_array($paramKey, array_keys($this->sorts))) {
                    /**
                     * sort
                     */
                    if ($paramValue === 'ASC') {
                        $select->orderBy($this->sorts[$paramKey], 'ASC');
                    } else {
                        $select->orderBy($this->sorts[$paramKey], 'DESC');
                    }
                } elseif (in_array($paramKey, array_keys($this->filters))) {
                    /**
                     * filter
                     */
                    $select->where($this->filters[$paramKey], $paramValue);
                }
            }
        }
        return $select;
    }
}
