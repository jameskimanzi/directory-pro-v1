<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

   
});

//**************Profiles Routes ****************************
Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/passwordChange','ProfileController@changePassword');
    Route::post('/passwordChange/{id}','ProfileController@postChangePassword');
    Route::get('/editProfile/{id}','ProfileController@editprofile');
    Route::post('/editprofile/{id}','ProfileController@posteditprofile');
});

Route::get('/county/{id}/sub-counties','Pages\CountyController@sub_counties');
Route::get('/county/{id}/sub-counties/create','Pages\CountyController@create_sub_counties');
Route::post('/county/{id}/sub-counties/create','Pages\CountyController@store_subcounty');
Route::post('/county/{id}/sub-county/delete','Pages\CountyController@destroy');
Route::get('/county/{id}/subcounties/{subc_id}/edit','Pages\CountyController@edit_subcounty');
Route::patch('/county/{id}/subcounties/{subc_id}/update','Pages\CountyController@update_subcounty');

Route::get('/subcounty/{id}/locations','Pages\SubcountyController@locations');
Route::get('/subcounty/{id}/locations/create','Pages\SubcountyController@create_locations');
Route::post('/subcounty/{id}/locations/create','Pages\SubcountyController@store_location');
Route::get('/subcounty/{id}/locations/{loc_id}/edit','Pages\SubcountyController@edit_location');
Route::patch('/subcounty/{id}/locations/{loc_id}/update','Pages\SubcountyController@update_location');

Route::get('/location/{id}/sublocations','Pages\LocationController@sublocations');
Route::get('/location/{id}/sublocations/create','Pages\LocationController@create_sublocations');
Route::post('/location/{id}/sublocations/create','Pages\LocationController@store_sublocation');
Route::get('/location/{id}/sublocations/{sub_id}/edit','Pages\LocationController@edit_sublocation');
Route::patch('/location/{id}/sublocations/{sub_id}/update','Pages\LocationController@update_sublocation');


Route::get('/constituency/{id}/wards','Pages\ConstituencyController@wards');
Route::get('/constituency/{id}/wards/create','Pages\ConstituencyController@create_wards');
Route::post('/constituency/{id}/wards/create','Pages\ConstituencyController@store_ward');
Route::get('/constituency/{id}/wards/{ward_id}/edit','Pages\ConstituencyController@edit_ward');
Route::patch('/constituency/{id}/wards/{ward_id}/update','Pages\ConstituencyController@update_ward');

Route::resource('members', 'MemberController');
Route::resource('groups', 'GroupController');
Route::resource('administrations', 'AdministrationController');
Route::resource('counties', 'CountyController');
Route::resource('subcounties', 'SubcountyController');
Route::resource('constituencies', 'ConstituencyController');
Route::resource('locations', 'LocationController');
Route::resource('wards', 'WardController');
Route::resource('sublocations', 'SublocationController');


