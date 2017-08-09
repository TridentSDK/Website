<?php

Route::group([
    'namespace' => '',
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'require-admin'],
], function () {
    CRUD::resource('permission', 'Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController');
    CRUD::resource('role', 'Backpack\PermissionManager\app\Http\Controllers\RoleCrudController');
    CRUD::resource('user', 'TridentSDK\Http\Controllers\Backpack\UserCrudController');
});
