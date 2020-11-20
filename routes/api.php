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

Route::group([

    'middleware' => ['auth:user'],
    'namespace' => 'App\Http\Controllers\User',
    'prefix' => 'user',

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::post('admin/login', 'App\Http\Controllers\Admin\AuthController@login');//->middleware('auth:admin');
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