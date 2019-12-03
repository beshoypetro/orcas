<?php

Route::get('/', 'HomeController@index');

Route::get('anyData','DatatablesController@getIndex');
Route::get('getIndex','DatatablesController@anyData')->name('datatable');

Route::get('/addRole/{role}','RoleController@addRole');
Route::get('/assignRole/{id}/{role}','RoleController@assignRole');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', 'UsersController');
    Route::post('getAttendanceSheet', 'UsersController@getAttendanceSheet');
});

