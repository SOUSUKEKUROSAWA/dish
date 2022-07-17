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
Route::get('/tags/searchtag', 'TagController@searchtag');
Route::get('/tags/randomtag', 'TagController@randomtag');
// 料理名選択
Route::get('/tags/{tag}/dishes/searchdish', 'TagController@searchdish'); // URIで渡されたidをさらにTagControllerに渡す(ルートモデルバインディング)
Route::get('/tags/{tag}/dishes/randomdish', 'TagController@randomdish');
// 投稿選択
Route::get('/dishes/{dish}/posts/searchpost', 'DishController@searchpost');

/*--- ログイン用 ---*/
Auth::routes();

/*--- Googleログイン用 ---*/
Route::get('/auth/redirect', 'Auth\GoogleLoginController@getGoogleAuth');
Route::get('/login/callback', 'Auth\GoogleLoginController@authGoogleCallback');

/*--- レシピを投稿するユーザー用 ---*/
Route::group(['middleware' => ['auth']], function(){ // この中のルーティングに未ログイン状態でアクセスすると強制的にログイン画面に移動する(authミドルウェアキーを使用)
    // タグ名選択・作成
    Route::get('/tags/selecttag', 'TagController@selecttag');
    Route::get('/tags/createtag', 'TagController@createtag');
    Route::post('/tags', 'TagController@store');
    // 料理名選択・作成
    Route::get('/tags/{tag}/dishes/selectdish', 'TagController@selectdish');
    Route::get('/tags/{tag}/dishes/createdish', 'TagController@createdish');
    Route::post('/dishes', 'DishController@store');
    // URLの登録
    Route::get('/dishes/{dish}/posts/posturl', 'DishController@posturl');
    Route::post('/posts/url', 'PostController@storeurl');
    // 画像のアップロード
    Route::get('/posts/{post}/postimg', 'PostController@postimg');
    Route::put('/posts/{post}/img_path', 'PostController@storeimg');
    // コメントの投稿
    Route::get('/posts/{post}/postcomment', 'PostController@postcomment');
    Route::put('/posts/{post}/comment', 'PostController@storecomment');
    
    /*--- マイページ用 ---*/
    // 一覧表示
    Route::get('/users/myindex', 'UserController@myindex');
    // URLの更新
    Route::get('/posts/{post}/editurl', 'PostController@editurl');
    Route::put('/posts/{post}/url/update', 'PostController@updateurl');
    // 画像の更新
    Route::get('/posts/{post}/editimg', 'PostController@editimg');
    Route::put('/posts/{post}/img_path/update', 'PostController@updateimg');
    // コメントの編集
    Route::get('/posts/{post}/editcomment', 'PostController@editcomment');
    Route::put('/posts/{post}/comment/update', 'PostController@updatecomment');
    // 投稿の削除
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