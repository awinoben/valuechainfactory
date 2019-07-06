<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('my-home', 'HomeController@myHome');

Route::get('my-users', 'HomeController@myUsers');

Route::get('/landing', 'HomeController@landing')->name('landing');

Route::get('warehouse', 'HomeController@warehouse');
