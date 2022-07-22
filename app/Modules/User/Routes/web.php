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

//Rgister
Route::get('admin/register', ['as' => 'register', 'uses' => 'RegisterAdminController@register']);
Route::post('admin/register', ['as' => 'post.register', 'uses' => 'RegisterAdminController@postRegister']);

//login
Route::get('admin/login', ['as' => 'login', 'uses' => 'AdminLoginController@login']);
Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'AdminLoginController@authenticate']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AdminLoginController@logout']);

//forget Password
Route::get('admin/forgetPassword', ['as' => 'forgetPassword', 'uses' => 'ResetAdminPasswordController@forgetPassword']);
Route::post('admin/check-email', ['as' => 'checkEmail', 'uses' => 'ResetAdminPasswordController@checkEmail']);
Route::post('admin/resetPassword', ['as' => 'resetPassword', 'uses' => 'ResetAdminPasswordController@resetPassword']);

Route::get('/admin-profile', ['as' => 'admin.profile', 'uses' => 'AdminController@profile'])->middleware('auth:admins');
Route::put('{id}/updateProfile', ['as' => 'admin.updateProfile', 'uses' => 'AdminController@updateProfile'])->where('id', '[0-9]+')->middleware('auth:admins');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins', 'admin', 'permission']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::put('{id}/update', ['as' => 'admin.update', 'uses' => 'AdminController@update'])->where('id', '[0-9]+');
        //List
        Route::get('list', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        ///CREATE
        Route::get('create', ['as' => 'admin.create', 'uses' => 'AdminController@create']);
        Route::post('create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);

        // UPDATE
        Route::get('{id}/edit', ['as' => 'admin.edit', 'uses' => 'AdminController@edit']);
        Route::put('{id}/update', ['as' => 'admin.update', 'uses' => 'AdminController@update'])->where('id',
            '[0-9]+');
        // DELETE
        Route::delete('delete', ['as' => 'admin.destroy', 'uses' => 'AdminController@destroy']);
        Route::get('status', ['as' => 'admin.status', 'uses' => 'AdminController@status']);

        Route::get('removeImage/{id}', ['as' => 'admin.removeImage', 'uses' => 'AdminController@removeImage']);

        //change password
        Route::get('setting/change-password', ['as' => 'setting.change-password', 'uses' => 'AdminLoginController@changePassword']);
        Route::POST('setting/update-password', ['as' => 'setting.update-password', 'uses' => 'AdminLoginController@updatePassword']);

    });

    Route::group(['prefix' => 'role'], function () {
        //List
        Route::get('list', ['as' => 'role.index', 'uses' => 'RoleController@index']);

        ///CREATE
        Route::get('create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::post('create', ['as' => 'role.store', 'uses' => 'RoleController@store']);

        // UPDATE
        Route::get('edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit'])->where('id', '[0-9]+');
        Route::put('update/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id', '[0-9]+');

        Route::get('delete/{id}', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);
        Route::get('status', ['as' => 'role.status', 'uses' => 'RoleController@status']);

        // DELETE
        Route::delete('role', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);

    });


});

Route::get('admin/permission-denied', ['as' => 'permission.denied', 'uses' => 'AdminLoginController@permissionDenied']);