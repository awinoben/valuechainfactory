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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', 'ItemsController@index');
Route::post('/sell/{id}', 'ItemsController@store');
Route::get('/orders/{type}', 'OrdersController@index');
Route::get('/orders/{id}/dispatch', 'OrdersController@dispatch');
