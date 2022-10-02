<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ // 複数代入の脆弱性対策
        'tag_name',
    ];
    
    /**
     * tagsテーブルとのリレーション
     * =>tagsテーブルはdishesテーブルに対して一対多の関係
     */
    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    /**
     * updated_atで降順に並べたあと、limitで件数制限をかけて取得する
     */
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    /**
     * テーブル内からランダムに1件取得する
     */
    public function getRandomTag()
    {
        return $this->inRandomOrder()->first();
    }
    
    /**
     * リレーションを使い，updated_atで降順に並べたあと、limitで件数制限をかけて取得する
     */
    public function getDishesPaginateByLimit(int $limit_count = 10)
    {
        return $this->dishes()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    /**
     * dishesを全て取得する
     */
    public function getDishesInTag()
    {
        return $this->dishes()->get(); // リレーションを用い，渡されたtag_idを持つdishesをコレクション型で取得
    }
    
    /**
     * dishesテーブル内からランダムに1件取得する
     * =>random()はコレクション型の関数（get()でhasManyオブジェクトからコレクションオブジェクトに変換）
     */
    public function getRandomDish()
    {
        return $this->dishes()->get()->random();
    }
}
