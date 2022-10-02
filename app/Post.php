<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'img_path',
        'comment',
        'dish_id',
        'user_id',
    ];

    /**
     * dishesテーブルとのリレーション
     * =>postsテーブルはdishesテーブルに対して多対一の関係
     */
    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }
    
    /**
     * usersテーブルとのリレーション
     * =>postsテーブルはusersテーブルに対して多対一の関係
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
