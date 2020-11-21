<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('employee/login', 'App\Http\Controllers\Employee\AuthController@login');
Route::group([

    'middleware' => ['auth:user'],
    'namespace' => 'App\Http\Controllers\Employee',
    'prefix' => 'employee',

], function ($router) {

    //Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::post('admin/login', 'App\Http\Controllers\Admin\AuthController@login');
Route::group([

    'middleware' => ['auth:admin'],
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',

], function ($router) {

	//Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('trainer/login', 'App\Http\Controllers\Trainer\AuthController@login');
Route::group([

    'middleware' => ['auth:trainer'],
    'namespace' => 'App\Http\Controllers\Trainer',
    'prefix' => 'trainer',

], function ($router) {

    //Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
