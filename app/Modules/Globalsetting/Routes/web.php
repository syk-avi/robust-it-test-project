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
   // Route::get('globalsetting', ['as' => 'globalsetting.index', 'uses' => 'SettingController@index']);

// CREATE | STORE
    Route::get('globalsetting/create', ['as' => 'globalsetting.create', 'uses' => 'SettingController@create']);
    Route::post('globalsetting', ['as' => 'globalsetting.store', 'uses' => 'SettingController@store']);

// SHOW
    Route::get('globalsetting/{id}', ['as' => 'globalsetting.show', 'uses' => 'SettingController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('globalsetting/{id}/edit', ['as' => 'globalsetting.edit', 'uses' => 'SettingController@edit'])->where('id', '[0-9]+');
    Route::put('globalsetting/{id}', ['as' => 'globalsetting.update', 'uses' => 'SettingController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('globalsetting', ['as' => 'globalsetting.destroy', 'uses' => 'SettingController@destroy']);
    Route::get('globalsetting/{id}/delete', ['as' => 'globalsetting.delete', 'uses' => 'SettingController@delete']);


    Route::get('globalsetting/removeImage/{id}/{field}', ['as' => 'globalsetting.removeImage', 'uses' => 'SettingController@removeImage']);

});