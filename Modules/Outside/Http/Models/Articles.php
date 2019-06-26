<?php

namespace Modules\Outside\Http\Models;

use App\MyCore\Models\DbTable;

class Articles extends DbTable {

    public $primaryKey = 'article_id';

    public function __construct($options = array()) {
        parent::__construct($options);

        $this->table = 'articles';

        $this->params = \Request::all();
    }

    public function showAll() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                ->where([
                    'categories.is_deleted' => 0,
                    'articles.is_deleted' => 0,
                    'categories.category_name' => 'Giới thiệu'
                ])->limit(4)->orderBy('ordering', 'asc')
                ->get();

        return $select;
    }

    public function showIntro() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                ->where([
                    'categories.is_deleted' => 0,
                    'articles.is_deleted' => 0,
                    'categories.category_name' => 'Giới thiệu'
                ])->orderBy('ordering', 'asc')
                ->get();

        return $select;
    }

    public function showNews() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'Tin tức'
                        ])->limit(4)
                        ->orderBy('date_created', 'des')
                        ->get()->toArray();

        return $select;
    }

    public function showNewsImages() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'Tin Ảnh'
                        ])->get()->toArray();

        return $select;
    }

    public function getContact() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'Liên Hệ'
                        ])->get();

        return $select;
    }

    public function getAbout() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'About'
                        ])->get();

        return $select;
    }

    public function getPosition() {
        $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'Tổ Chức'
                        ])->get();

        return $select;
    }
    
    public function getNews(){
                $select = Articles::select('categories.category_name', $this->table . '.*')
                        ->join('categories', 'categories.category_id', '=', $this->table . '.category_id')
                        ->where([
                            'categories.is_deleted' => 0,
                            'articles.is_deleted' => 0,
                            'categories.category_name' => 'Biên Bản'
                        ])
                        ->orderBy('date_created', 'des')
                        ->get();

        return $select;
    }

}
