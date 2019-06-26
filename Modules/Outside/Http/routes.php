<?php

Route::group(['middleware' => 'web', 'prefix' => 'outside', 'namespace' => 'Modules\Outside\Http\Controllers'], function() {
    Route::get('/', 'OutsideController@getIndex');
    Route::get('/show-all', 'IndexController@getShowAll');
    Route::get('/articles/show-all', 'ArticlesController@getShowAll');
    Route::get('/articles/show-news-images', 'ArticlesController@getNewsImages');
    Route::get('/articles/detail/{id}', 'ArticlesController@getDetail');
    Route::get('/articles/contact', 'ArticlesController@getContact');
    Route::get('/articles/about', 'ArticlesController@getAbout');
    Route::get('/articles/position', 'ArticlesController@getPosition');
    Route::get('/articles/news', 'ArticlesController@getNews');
    Route::get('/articles/news-detail/{id}', 'ArticlesController@getNewsDetail');

    Route::get('/articles/show-intro', 'ArticlesController@getIntro');
    Route::get('/organizations/show-all', 'OrganizationsController@getShowAll');
    Route::get('/organizations/detail/{id}', 'OrganizationsController@getDetail');
    Route::get('/positions/show-position', 'PositionsController@getShowPosition');
});
