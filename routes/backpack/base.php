<?php

Route::group([
    'namespace' => 'Backpack\Base\app\Http\Controllers',
    'middleware' => ['web', 'require-admin'],
    'prefix' => config('backpack.base.route_prefix'),
], function () {
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('/', 'AdminController@redirect');
});
