<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

   
});
Route::get('/get-constituencies/{county}','Pages\APIController@getConstituencies');
Route::get('/get-wards/{constituency}','Pages\APIController@getWards');
