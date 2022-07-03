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

Route::get('all/user', 'UserController@users');
Route::get('all/country', 'MainController@country');
Route::get('all/province', 'MainController@province');
Route::post('login', 'LoginController@loginApi');
Route::post('logout', 'LogoutController')->middleware('auth:sanctum');
Route::post('register', 'RegisterController');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // $user = Auth::user();
    // dd([$user, $user->currentAccessToken()]);
    return $request->user();
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
