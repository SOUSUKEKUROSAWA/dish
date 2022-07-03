<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [ // 複数代入の脆弱性対策
        'tag_name',
    ];

    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count); // updated_atで降順に並べたあと、limitで件数制限をかける
    }

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
}
