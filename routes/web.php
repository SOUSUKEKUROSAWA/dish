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

/*--- トップぺージ用 ---*/
Route::get('/', function () {
    return view('front');
});

/*--- レシピを検索するユーザー用 ---*/
// タグ名選択
Route::get('/searchtag', 'TagController@searchtag');
Route::get('/tags/randomtag', 'TagController@randomtag');
// 料理名選択
Route::get('/searchtag/tags/{tag}', 'TagController@searchdish'); // URIで渡されたidをさらにTagControllerに渡す(ルートモデルバインディング)
Route::get('/tags/{tag}/dishes/randomdish', 'TagController@randomdish');
// 投稿選択
Route::get('/searchdish/dishes/{dish}', 'DishController@searchpost');

/*--- ログイン用 ---*/
Auth::routes();

/*--- Googleログイン用 ---*/
Route::get('/auth/redirect', 'Auth\GoogleLoginController@getGoogleAuth');
Route::get('/login/callback', 'Auth\GoogleLoginController@authGoogleCallback');

/*--- レシピを投稿するユーザー用 ---*/
Route::group(['middleware' => ['auth']], function(){ // この中のルーティングに未ログイン状態でアクセスすると強制的にログイン画面に移動する(authミドルウェアキーを使用)
    // タグ名選択・作成
    Route::get('/selecttag', 'TagController@selecttag');
    Route::get('/createtag', 'TagController@createtag');
    Route::post('/tags', 'TagController@store');
    // 料理名選択・作成
    Route::get('/tags/{tag}', 'TagController@selectdish');
    Route::get('/tags/{tag}/createdish', 'TagController@createdish');
    Route::post('/dishes', 'DishController@store');
    // URLの登録
    Route::get('/dishes/{dish}', 'DishController@posturl');
    Route::post('/posts/url', 'PostController@storeurl');
    // 画像のアップロード
    Route::get('/posts/img/{post}', 'PostController@postimg');
    Route::put('/posts/img/{post}', 'PostController@updateimg');
    // コメントの投稿
    Route::get('/posts/comment/{post}', 'PostController@postcomment');
    Route::put('/posts/comment/{post}', 'PostController@updatecomment');
    // 自身の投稿の一覧・編集・削除
    Route::get('/posts/myindex', 'UserController@myindex');
    Route::get('/posts/url/{post}/editer', 'PostController@openUrlEditer');
    Route::get('/posts/img/{post}/editer', 'PostController@openImgEditer');
    Route::get('/posts/comment/{post}/editer', 'PostController@openCommentEditer');
    Route::put('/posts/url/{post}/edit', 'PostController@editUrl');
    Route::put('/posts/img/{post}/edit', 'PostController@editImg');
    Route::put('/posts/comment/{post}/edit', 'PostController@editComment');
    Route::delete('/posts/{post}', 'PostController@delete');
});

/*--- メンテナンス画面用 ---*/
Route::get('/underdevelopment', function () {
    return view('underdevelopment');
});

/*--- 上記に当てはまらないアクセス用 ---*/
Route::get('*', function() {
    return view('not_found');
});