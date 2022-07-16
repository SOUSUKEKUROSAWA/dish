<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [ // 複数代入の脆弱性対策
        'tag_name',
    ];
    
    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count); // updated_atで降順に並べたあと、limitで件数制限をかける
    }
    
    public function getRandomTag()
    {
        return $this->inRandomOrder()->first(); // tagsテーブル内からランダムに1件取得
    }
    
    public function getDishesPaginateByLimit(int $limit_count = 10)
    {
        return $this->dishes()->orderBy('updated_at', 'DESC')->paginate($limit_count); // リレーションを使い，渡されたtag_idを持つdishesをページネーションを行ったうえで取得
    }
    
    public function getDishesInTag()
    {
        return $this->dishes()->get(); // リレーションを用い，渡されたtag_idを持つdishesをコレクション型で取得
    }
    
    public function getRandomDish()
    {
        return $this->dishes()->get()->random(); // random()はコレクション型の関数（get()でhasManyオブジェクトからコレクションオブジェクトに変換）
    }
}
