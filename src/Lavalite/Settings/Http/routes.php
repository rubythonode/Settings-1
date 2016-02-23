<?php

// Admin routes for module
Route::group(['prefix' => trans_setlocale().'/admin/settings', 'middleware' => ['web', 'auth.role:admin']], function () {
    Route::resource('setting', 'SettingAdminController');
});

// Public routes for module
Route::group(['prefix' => trans_setlocale(), 'middleware' => ['web']], function () {
	Route::get('settings', 'PublicController@index');
	Route::get('settings/{slug?}', 'PublicController@details');
});
