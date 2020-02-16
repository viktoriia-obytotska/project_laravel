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

Route::post('/register', 'RegisterController@index');
Route::post('/token', 'AuthController@getToken');

Route::middleware('auth_api')->group(function (){
    Route::get('books', 'BookController@index');
    Route::post('books', 'BookController@store');
    Route::get('books/{id}', 'BookController@show');
    Route::put('books/{id}', 'BookController@update');
    Route::delete('books{id}', 'BookController@destroy');
});


