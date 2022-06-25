<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'url',
        'img_path',
        'comment',
        'dish_id',
    ];

    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }
}
