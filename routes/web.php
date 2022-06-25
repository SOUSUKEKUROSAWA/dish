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

Route::get('/searchtag', 'TagController@searchtag');
Route::get('/tags/randomtag', 'TagController@randomtag');
Route::get('/searchtag/tags/{tag}', 'TagController@searchdish');
Route::get('tags/{tag}/dishes/randomdish', 'TagController@randomdish');
Route::get('/searchdish/dishes/{dish}', 'DishController@searchpost');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/selecttag', 'TagController@selecttag');
    Route::get('/createtag', 'TagController@createtag');
    Route::get('/tags/{tag}', 'TagController@selectdish');
    Route::get('/tags/{tag}/createdish', 'TagController@createdish');
    Route::get('/dishes/{dish}', 'DishController@posturl');
    Route::get('/posts/img/{post}', 'PostController@postimg');
    Route::get('/posts/comment/{post}', 'PostController@postcomment');
    Route::post('/tags', 'TagController@store');
    Route::post('/dishes', 'DishController@store');
    Route::post('/posts/url', 'PostController@storeurl');
    Route::put('/posts/img/{post}', 'PostController@updateimg');
    Route::put('posts/comment/{post}', 'PostController@updatecomment');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/redirect', 'Auth\GoogleLoginController@getGoogleAuth');
Route::get('/login/callback', 'Auth\GoogleLoginController@authGoogleCallback');
