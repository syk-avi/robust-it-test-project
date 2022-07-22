<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin','middleware' =>  ['auth:admins','admin','permission']], function () {
// INDEX
    Route::get('banner', ['as' => 'banner.index', 'uses' => 'BannerController@index']);

// CREATE | STORE
    Route::get('banner/create', ['as' => 'banner.create', 'uses' => 'BannerController@create']);
    Route::post('banner', ['as' => 'banner.store', 'uses' => 'BannerController@store']);

// SHOW
    Route::get('banner/{id}', ['as' => 'banner.show', 'uses' => 'BannerController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('banner/{id}/edit', ['as' => 'banner.edit', 'uses' => 'BannerController@edit'])->where('id', '[0-9]+');
    Route::put('banner/{id}', ['as' => 'banner.update', 'uses' => 'BannerController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('banner', ['as' => 'banner.destroy', 'uses' => 'BannerController@destroy']);
    Route::get('banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'BannerController@delete']);

    Route::get('banner/status', ['as' => 'banner.status', 'uses' => 'BannerController@status']);

    Route::get('banner/removeImage/{id}', ['as' => 'banner.removeImage', 'uses' => 'BannerController@removeImage']);
    Route::get('banner/removeFile/{id}', ['as' => 'banner.removeFile', 'uses' => 'BannerController@removeFile']);


    /*Route::post('banner/sort/', ['as' => 'banner.ajax.sort', 'uses' => 'BannerController@ajaxSort']);*/
});