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

/*--- 諸注意 ---*/
// search~はレシピ検索ユーザー側のURI，view等を表しています．
// select~はレシピ投稿ユーザー側のURI，view等を表しています．

Route::get('/', function () {
    return view('front');
});

Route::get('/searchtag', 'TagController@searchtag');
Route::get('/tags/randomtag', 'TagController@randomtag');
Route::get('/searchtag/tags/{tag}', 'TagController@searchdish'); // URIで渡されたidをさらにTagControllerに渡す
Route::get('/tags/{tag}/dishes/randomdish', 'TagController@randomdish');
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
    Route::put('/posts/comment/{post}', 'PostController@updatecomment');
    Route::get('/posts/myindex', 'UserController@myindex');
    Route::get('/posts/url/{post}/editer', 'PostController@openUrlEditer');
    Route::get('/posts/img/{post}/editer', 'PostController@openImgEditer');
    Route::get('/posts/comment/{post}/editer', 'PostController@openCommentEditer');
    Route::put('/posts/url/{post}/edit', 'PostController@editUrl');
    Route::put('/posts/img/{post}/edit', 'PostController@editImg');
    Route::put('/posts/comment/{post}/edit', 'PostController@editComment');
    Route::delete('/posts/{post}', 'PostController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/redirect', 'Auth\GoogleLoginController@getGoogleAuth');
Route::get('/login/callback', 'Auth\GoogleLoginController@authGoogleCallback');

Route::get('/underdevelopment', function () {
    return view('underdevelopment');
});
