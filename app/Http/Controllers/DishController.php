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
}
