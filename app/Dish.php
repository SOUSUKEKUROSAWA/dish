<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dish_name',
        'tag_id',
    ];

    /**
     * tagsテーブルとのリレーション
     * =>dishesテーブルはtagsテーブルに対して多対一の関係
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    /**
     * postsテーブルとのリレーション
     * =>dishesテーブルはpostsテーブルに対して一対多の関係
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * updated_atで降順に並べたあと、limitで件数制限をかけて取得する
     */
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    /**
     * updated_atで降順に並べたあと取得する
     */
    public function getPosts()
    {
        return $this->posts()->orderBy('updated_at', 'DESC')->get(); // updated_atで降順に並べたあと、取得
    }
    
    /**
     * 指定のpostsを全て取得する
     */
    public function getPostsInDish()
    {
        return $this->posts()->get();
    }
}
