<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {
    Route::post('login', 'api\AuthController@login')->name('login');
    Route::post('logout', 'api\AuthController@logout');
//    Route::post('refresh', 'api\AuthController@refresh');
//    Route::post('me', 'api\AuthController@me');
//    Route::post('register', 'api\AuthController@register');
});
Route::group(['middleware' => 'employee'], function () {
    Route::post('checkIn','EmployeeController@checkIn');
    Route::post('checkOut','EmployeeController@checkOut');

});





Route::resource('requests', 'RequestsAPIController');