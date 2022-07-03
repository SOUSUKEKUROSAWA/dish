<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /*--- レシピを検索するユーザー用 ---------------------------------------------------------------------------------------------------------------------------*/
    public function searchtag(Tag $tag)
    {
        return view('tags/search_tag')->with(['tags' => $tag -> getPaginateByLimit()]); // getPaginateByLimit()はTag.php内で定義
    }
    
    public function randomtag(Tag $tag)
    {
        $randomtag=$tag::inRandomOrder()->first(); // tagsテーブル内からランダムに1件取得
        return view('tags/randomtag')->with(['randomtag' => $randomtag ]);
    }
    
    public function searchdish(Tag $tag) // $tagには渡されたidが設定されている（LaravelによるDIを利用）
    {
        $dishes=$tag->dishes()->orderBy('updated_at', 'DESC')->paginate(10); // リレーションを使い，渡されたtag_idを持つdishesをページネーションを行ったうえで取得
        return view('dishes/search_dish')->with(['tag' => $tag, 'dishes' => $dishes ]);
    }
    
    public function randomdish(Tag $tag)
    {
        $randomdish=$tag->dishes()->get()->random(); // random()はコレクション型の関数（get()でhasManyオブジェクトからコレクションオブジェクトに変換）
        return view('dishes/randomdish')->with(['tag' => $tag, 'randomdish' => $randomdish ]);
    }
    /*----------------------------------------------------------------------------------------------------------------------------------------------------------*/
    
    /*--- レシピを投稿するユーザー用 ----------------------------------------------------*/
    public function selecttag(Tag $tag)
    {
        return view('tags/select_tag')->with(['tags' => $tag -> getPaginateByLimit()]);
    }
    
    public function createtag(Tag $tag)
    {
        return view('tags/create_tag');
    }
    
    public function store(Tag $tag, TagRequest $request) // DIで渡されたidを持ったタグがインスタンス化されるタイミングでバリデーションを実行→バリデーションエラーは$errorsに格納される
    {
        $input = $request['tag']; // tagをキーに持つリクエストパラメータを取得（キー名はForm内inputタグのname属性を表す）
        $tag->fill($input)->save(); // fillでtagインスタンスを上書き，saveでMySQLへのINSERT文を実行
        return redirect('/tags/' . $tag->id); // save()が実行された時点でtagインスタンスのidは自動採番されるので，そのidをweb.phpに渡す
    }

    public function selectdish(Tag $tag)
    {
        $dishes=$tag->dishes()->orderBy('updated_at', 'DESC')->paginate(10);
        return view('dishes/select_dish')->with(['tag' => $tag, 'dishes' => $dishes ]);
    }

    public function createdish(Tag $tag)
    {
        return view('dishes/create_dish')->with(['tag' => $tag ]);
    }
    /*-----------------------------------------------------------------------------------*/
}
