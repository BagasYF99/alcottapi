<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/user/store', 'UserController@store')->middleware('auth');
Route::get('/user', 'UserController@index')->middleware('auth');

Route::get('/dashboard', 'MainController@index')->middleware('auth');
// Route::get('/filterProvince', 'MainController@index');
Route::get('/register', 'MainController@register');
Route::post('/login/post', 'LoginController@authenticate')->name('login');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
// Route::get('/', function () {
//     return view('welcome');
// });
