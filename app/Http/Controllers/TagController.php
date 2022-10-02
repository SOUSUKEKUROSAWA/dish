<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tag Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーでは気分タグ(tagsテーブル内のリソース)に対する処理を
    | 行います．
    |
    */
    
    /*--- レシピ探しユーザー用 -----------------------------------------------*/
    /**
     * 気分タグの一覧を表示する
     */
    public function searchtag(Tag $tag)
    {
        return view('tags/search_tag')->with(['tags' => $tag -> getPaginateByLimit() ]);
    }
    
    /**
     * ランダムに選んだ気分タグを一つ表示する
     */
    public function randomtag(Tag $tag)
    {
        return view('tags/randomtag')->with(['randomtag' => $tag -> getRandomTag() ]);
    }
    
    /**
     * 渡された気分タグ内にある料理名タグの一覧を表示する
     */
    public function searchdish(Tag $tag)
    {
        $dishesCounter=count($tag->getDishesInTag());

        // 取得した気分タグ内に料理名タグが存在しない場合，別のビューを返す
        if ($dishesCounter==0) {
            return view('empty')->with(['tag' => $tag, 'viewType' => "tag"]);
        }

        return view('dishes/search_dish')->with(['tag' => $tag, 'dishes' => $tag -> getDishesPaginateByLimit() ]);
    }
    
    /**
     * ランダムに選んだ料理名タグを一つ表示する
     */
    public function randomdish(Tag $tag)
    {
        return view('dishes/randomdish')->with(['tag' => $tag, 'randomdish' => $tag -> getRandomDish() ]);
    }
    /*------------------------------------------------------------------------*/
    
    /*--- レシピ投稿ユーザー用 -----------------------------------------*/
    /**
     * 気分タグの一覧を表示する
     */
    public function selecttag(Tag $tag)
    {
        return view('tags/select_tag')->with(['tags' => $tag -> getPaginateByLimit()]);
    }
    
    /**
     * 気分タグの作成ページを表示する
     */
    public function createtag(Tag $tag)
    {
        return view('tags/create_tag');
    }
    
    /**
     * ユーザーにより入力された気分タグをDBへ保存する
     * =>DIで渡されたidを持ったタグがインスタンス化されるタイミングでバリデーションを実行
     * =>バリデーションエラーは$errorsに格納される
     */
    public function store(Tag $tag, TagRequest $request)
    {
        // tagをキーに持つリクエストパラメータを取得（キー名はForm内inputタグのname属性を表す）
        $input = $request['tag'];
        // fillでtagインスタンスを上書き，saveでMySQLへのINSERT文を実行
        $tag->fill($input)->save();
        // save()が実行された時点でtagインスタンスのidは自動採番されるので，そのidをweb.phpに渡す
        return redirect('/tags/' . $tag->id . '/dishes/selectdish');
    }

    /**
     * 料理名タグの一覧を表示する
     */
    public function selectdish(Tag $tag)
    {
        return view('dishes/select_dish')->with(['tag' => $tag, 'dishes' => $tag -> getDishesPaginateByLimit() ]);
    }

    /**
     * 料理名タグの作成ページを表示する
     */
    public function createdish(Tag $tag)
    {
        return view('dishes/create_dish')->with(['tag' => $tag ]);
    }
    /*------------------------------------------------------------------------*/
}
