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
    return view('welcome page');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Auth::routes();

Route::get('/home', 'MainController@index')->name('main');

Route::get('/home/add/category', 'CategoryController@index');
Route::post('/home/add/category', 'CategoryController@create')->name('add_category');

Route::get('/home/add/restaurant', 'HomeController@index');
Route::post('/home/add/restaurant', 'HomeController@create')->name('home');
Route::get('/home/restaurants/', 'HomeController@show')->name('show_restaurants');
Route::get('/home/restaurants/{category}', 'CategoryController@show')->name('restaurant_category');
Route::get('/home/restaurants/{id}/edit', 'HomeController@edit');
Route::post('/home/restaurants/{id}/edit', 'HomeController@update')->name('edit_restaurant');
Route::get('/home/restaurants/{id}/delete', 'HomeController@destroy')->name('destroy_restaurant');

Route::get('/home/add/dish', 'DishController@index');
Route::post('/home/add/dish', 'DishController@create')->name('add_dish');
Route::get('/home/{restaurant}/dishes', 'DishController@show')->name('show_dishes');
Route::get('/home/{restaurant}/dishes/{id}/edit', 'DishController@edit');
Route::post('/home/{restaurant}/dishes/{id}/edit', 'DishController@update')->name('edit_dish');
Route::get('/home/dishes/{id}/delete', 'DishController@destroy')->name('destroy_dish');

Route::get('/home/orders', 'OrderController@show')->name('show_orders');
