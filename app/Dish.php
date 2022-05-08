<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
