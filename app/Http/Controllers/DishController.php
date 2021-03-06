<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{
    /*--- レシピを検索するユーザー用 --------------------------------------------------*/
    public function searchpost(Dish $dish)
    {
        return view('posts/search_post')->with(['dish' => $dish, 'posts' => $dish -> getPosts() ]);
    }
    /*----------------------------------------------------------------------------------*/
    
    /*--- レシピを投稿するユーザー用 -------------------------------*/
    public function store(Dish $dish, DishRequest $request)
    {
        $input = $request['dish'];
        $dish->fill($input)->save();
        return redirect('/dishes/' . $dish->id . '/posts/posturl');
    }

    public function posturl(Dish $dish)
    {
        return view('posts/post_url')->with([ 'dish' => $dish ]);
    }
    /*---------------------------------------------------------------*/
}
