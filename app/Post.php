<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'url',
        'img_path',
        'comment',
        'dish_id',
        'user_id',
    ];

    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
