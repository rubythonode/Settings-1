<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('/settings/setting/list', 'Lavalite\Settings\Http\Controllers\SettingAdminController@lists');
    Route::resource('/settings/setting', 'Lavalite\Settings\Http\Controllers\SettingAdminController');
});

Route::get('settings', 'Lavalite\Setting\Http\Controllers\PublicController@list');
Route::get('settings/{slug?}', 'Lavalite\Setting\Http\Controllers\PublicController@details');
