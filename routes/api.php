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

Route::get('properties', 'PropertyController@index');
Route::get('properties/{property}', 'PropertyController@show');
Route::post('properties', 'PropertyController@store');
Route::put('properties/{property}', 'PropertyController@update');
//Route::delete('properties/{property}', 'PropertyController@delete');