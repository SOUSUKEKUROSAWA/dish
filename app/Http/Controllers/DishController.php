<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{
    public function store(Dish $dish, DishRequest $request)
    {
        $input = $request['dish'];
        $dish->fill($input)->save();
        return redirect('/dishes/' . $dish->id);
    }

    public function posturl(Dish $dish)
    {
        return view('posts/post_url')->with([ 'dish' => $dish ]);
    }

    public function searchpost(Dish $dish)
    {
        $posts=$dish->posts()->get();
        return view('posts/search_post')->with(['dish' => $dish, 'posts' => $posts ]);
    }
}
