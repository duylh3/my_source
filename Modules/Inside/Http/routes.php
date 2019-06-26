<?php

Route::group(['middleware' => 'web', 'prefix' => 'inside', 'namespace' => 'Modules\Inside\Http\Controllers'], function() {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'InsideController@index');
        Route::get('categories/show-all', 'CategoriesController@getShowAll');
        Route::get('categories/add', 'CategoriesController@getAdd');
        Route::post('categories/add', 'CategoriesController@postAdd');

        Route::get('articles/show-all', 'ArticlesController@getShowAll');
        Route::get('articles/add', 'ArticlesController@getAdd');
        Route::post('articles/add', 'ArticlesController@postAdd');
        Route::get('static/ck', 'StaticController@getCk');
        Route::get('articles/edit/{id}', 'ArticlesController@getEdit');
        Route::post('articles/edit/{id}', 'ArticlesController@postEdit');
        Route::post('articles/delete/{id}', 'ArticlesController@postDelete');

        Route::get('news/show-all', 'NewsController@getShowAll');
        Route::get('news/add', 'NewsController@getAdd');
        Route::post('news/add', 'NewsController@postAdd');
//        Route::get('static/ck', 'StaticController@getCk');
        Route::get('news/edit/{id}', 'NewsController@getEdit');
        Route::post('news/edit/{id}', 'NewsController@postEdit');
        Route::post('news/delete/{id}', 'NewsController@postDelete');

        Route::get('organizations/add', 'OrganizationsController@getAdd');
        Route::post('organizations/add', 'OrganizationsController@postAdd');
        Route::get('organizations/show-all', 'OrganizationsController@getShowAll');
        Route::get('organizations/edit/{id}', 'OrganizationsController@getEdit');
        Route::post('organizations/edit/{id}', 'OrganizationsController@postEdit');
        Route::post('organizations/delete/{id}', 'OrganizationsController@postDelete');

        Route::get('positions/show-all', 'PositionsController@getShowAll');
        Route::get('positions/add', 'PositionsController@getAdd');
        Route::post('positions/add', 'PositionsController@postAdd');
        Route::get('positions/edit/{id}', 'PositionsController@getEdit');
        Route::post('positions/edit/{id}', 'PositionsController@postEdit');
        Route::post('positions/delete/{id}', 'PositionsController@postDelete');
    });
    Route::get('users/login', 'UsersController@getLogin');
    Route::post('users/login', 'UsersController@postLogin');
});

