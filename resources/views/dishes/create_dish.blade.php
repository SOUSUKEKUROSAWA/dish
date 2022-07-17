@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ気分「{{ $tag->tag_name }}」</h1>
    
    <h2 class='guide'>料理名を考えてね</h2>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/dishes" method="POST">
        @csrf
        <div class="justify-content input-field">
            <div>
                <input class="input url-input" type="text" name="dish[dish_name]" placeholder="短く，わかりやすい料理名を入力してね" value="{{ old('dish.dish_name') }}"/>
                <p class="title__error centreren" style="color:red">{{ $errors->first('dish.dish_name') }}</p>
            </div>
            <input class="input submit-input" type="submit" value="作成"/>
        </div>
        
        <input type="hidden" name="dish[tag_id]" value="{{ $tag->id }}"/> <!-- hiddenタイプのinputタグによって，tagsテーブルとのリレーションに必要なtag_idを自動登録 -->
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/selectdish">戻る</a>
    </div>
@endsection