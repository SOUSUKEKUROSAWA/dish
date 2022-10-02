<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dish Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーでは料理名(dishesテーブル内のリソース)に対する処理を行います．
    | ここでは，レシピを探しているユーザー側の処理を前半に，レシピを投稿してもらう
    | ユーザー側の処理を後半に記述しています．
    |
    */
    
    /*--- レシピ探しユーザー用 -----------------------------------------------*/
    /**
     * 渡された料理名タグ内にある投稿一覧を表示する
     */ 
    public function searchpost(Dish $dish)
    {
        $postsCounter=count($dish->getPostsInDish());

        if ($postsCounter==0) { // 取得した料理名タグ内に投稿が存在しない場合，別のビューを返す
            return view('empty')->with(['dish' => $dish, 'viewType' => "dish"]);
        }

        return view('posts/search_post')->with(['dish' => $dish, 'posts' => $dish -> getPosts()]);
    }
    /*------------------------------------------------------------------------*/
    
    /*--- レシピ投稿ユーザー用 -----------------------------------------------*/
    /**
     * ユーザーにより入力された料理名タグをDBへ保存する
     */
    public function store(Dish $dish, DishRequest $request)
    {
        $input = $request['dish'];
        $dish->fill($input)->save();
        return redirect('/dishes/' . $dish->id . '/posts/posturl');
    }

    /**
     * レシピサイトURLの登録画面を表示する
     */ 
    public function posturl(Dish $dish)
    {
        return view('posts/post_url')->with([ 'dish' => $dish ]);
    }
    /*------------------------------------------------------------------------*/
}
