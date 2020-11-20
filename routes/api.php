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
Route::post('user/login', 'App\Http\Controllers\User\AuthController@login');
Route::group([

    'middleware' => ['auth:user'],
    'namespace' => 'App\Http\Controllers\User',
    'prefix' => 'user',

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

// Route::get('/ldap-test', function (Request $request){
//     try {
//         $credentials = $request->only('username');
//         $username = $credentials['username'];
//         $ldapuser = \Illuminate\Support\Facades\Auth::guard('user')->attempt(['username' => 'tesla', 'password' => 'password']);
//         //$ldapuser = \Adldap\Laravel\Facades\Adldap::getFacadeRoot()->auth()->attempt($mail = 'tesla@ldap.forumsys.com', $password = 'password');
//         //$ldapuser = Adldap\Laravel\Facades\Adldap::search()->where('uid','=',$username."")->first();
//         return response()->json($ldapuser);
//         //return response()->json(\Illuminate\Support\Facades\Auth::user()->getCommonName());

//     } catch (Exception $e) {
//         dd($e);
//         //return response()->json(["message"=>"dasdsa"], 200);
//     }
// });