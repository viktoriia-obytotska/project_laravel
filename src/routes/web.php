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


Route::get('/', 'BooksController@index');
Route::post('/', 'BooksController@store')->name('add_books');
Route::get('/books', 'BooksController@show')->name('saved_books');
Route::get('/books/{id}/edit', 'BooksController@edit');
Route::post('/books/{id}/edit', 'BooksController@update')->name('edit_books');
Route::get('/books/{id}/delete', 'BooksController@destroy')->name('destroy_books');
Route::get('/books/search', 'BooksController@search');
Route::post('/books/search', 'BooksController@search')->name('search_books');

Route::get('/agent', 'AgentController@mobileAgent');


