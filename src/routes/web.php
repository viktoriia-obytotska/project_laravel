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
Route::get('/weather/{city}', 'WeatherController@index');
Route::get('/weather/city', 'WeatherController@action');

Route::get('/weather', 'SearchController@show')->name('show');
Route::post('/weather', 'SearchController@search')->name('search');

