<?php

namespace App\MyCore\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyCore\Inside\Helpers\ApiFile;
use DB;

class DbTable extends Model {

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    protected $table = null;
    protected $fillable = array();
    public $searchs = array();
    public $sorts = array();
    public $filters = array();
    public $params = array();

    /**
     * Lấy danh sách column trong table
     *
     * @return multitype:
     * @author Giau Le
     */
    public function getColumnsInTable() {
        $columns = array();
        $adapter = $this->adapter;
        $columnObjects = DB::select("DESCRIBE {$this->table}");
        foreach ($columnObjects as $columnObject) {
            $columns[] = $columnObject->Field;
        }
        return $columns;
    }

    /**
     * Lọc lại data theo column
     *
     * @param unknown $data
     * @param unknown $object
     * @return multitype:unknown
     * @author Giau Le
     */
    public function filterColumns($data, &$object) {
        $dataFormat = array();

        $columns = $this->getColumnsInTable();

        foreach ($data as $column => $value) {
            if (in_array($column, $columns)) {
                $object->$column = $value;
                $dataFormat[$column] = $value;
            }
        }
        return $dataFormat;
    }

    /**
     * Enter description here ...
     * @param unknown $id
     * @author Giau Le
     */
    public function remove($id) {
        /**
         * Lưu trong object
         */
        $object = $this->findOrNew($id);
        $object->is_deleted = !$object->is_deleted;
        return $object->save();
    }

    /**
     * Enter description here ...
     * @param unknown $ids
     * @author Giau Le
     */
    public function removeMulti($ids) {
        foreach ($ids as $id) {
            /**
             * Lưu trong object
             */
            $object = $this->findOrNew($id);
            $object->is_deleted = !$object->is_deleted;
            $object->save();
        }
    }

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

    /**
     * Enter description here ...
     * @param unknown $data
     * @author Giau Le
     */
    public function saveImage($data) {
//        $url = 'http://hi-static.fpt.vn/save.php';
        $url = env('URL_STATIC') . '/save.php';
        return ApiFile::save($url, $data);
    }
    public function saveImageEvent($data) {
        $url = env('URL_STATIC') . '/save_event.php';
        return ApiFile::save($url, $data);
    }

}
