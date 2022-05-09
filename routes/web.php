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
    return view('front');
});
Route::get('/selecttag', 'TagController@selecttag');
Route::get('/createtag', 'TagController@createtag');
Route::get('/tags/{tag}', 'TagController@selectdish');
Route::get('/tags/{tag}/createdish', 'TagController@createdish');
Route::get('/dishes/{dish}', 'DishController@posturl');
//Route::get('/dishes/{dish}/', 'DishController@postcomment');

Route::post('/tags', 'TagController@store');
Route::post('/dishes', 'DishController@store');
Route::post('/posts', 'PostController@store');
