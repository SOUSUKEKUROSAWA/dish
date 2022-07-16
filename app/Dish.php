<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'dish_name',
        'tag_id',
    ];

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count); // updated_atで降順に並べたあと、limitで件数制限をかける
    }
    
    public function getPosts()
    {
        return $this->posts()->orderBy('updated_at', 'DESC')->get(); // updated_atで降順に並べたあと、取得
    }
}
