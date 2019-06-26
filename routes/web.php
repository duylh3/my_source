<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('outside::index');
//});
Route::get('/', '\Modules\Outside\Http\Controllers\OutsideController@getIndex');
//Route::group(['middleware' => 'web', 'namespace' => 'Outside'], function()
//{
//    Route::get('/', 'OutsideController@getIndex');
//});
