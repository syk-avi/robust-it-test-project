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

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins', 'admin' , 'permission' ]], function () {
// INDEX
    Route::get('pages', ['as' => 'page.index', 'uses' => 'PagesController@index']);

// CREATE | STORE
    Route::get('pages/create', ['as' => 'page.create', 'uses' => 'PagesController@create']);
    Route::post('pages', ['as' => 'page.store', 'uses' => 'PagesController@store']);

// SHOW
    Route::get('pages/{id}', ['as' => 'page.show', 'uses' => 'PagesController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('pages/{id}/edit', ['as' => 'page.edit', 'uses' => 'PagesController@edit'])->where('id', '[0-9]+');
    Route::put('pages/{id}', ['as' => 'page.update', 'uses' => 'PagesController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('pages', ['as' => 'page.destroy', 'uses' => 'PagesController@destroy']);
    Route::get('pages/{id}/delete', ['as' => 'page.delete', 'uses' => 'PagesController@delete']);

    Route::get('pages/status', ['as' => 'page.status', 'uses' => 'PagesController@status']);

    Route::get('pages/removeImage/{id}', ['as' => 'page.removeImage', 'uses' => 'PagesController@removeImage']);
    Route::get('pages/removeFile/{id}', ['as' => 'page.removeFile', 'uses' => 'PagesController@removeFile']);


});