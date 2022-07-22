<?php



Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins', 'admin']], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

});


