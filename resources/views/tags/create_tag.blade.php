@extends('layouts.app')

@section('content')
    <h1 class='title'>気分タグの新規作成</h1>
    
    <h2 class='guide'>タグ名を考えてね</h2>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/tags" method="POST">
        @csrf
        <div class="justify-content input-field">
            <input class="input url-input" type="text" name="tag[tag_name]" placeholder="他の人がどんな気分か想像してみよう" value="{{ old('tag.tag_name') }}"/> <!-- valueの値はTagRequestによるバリデーションに引っかかった場合でもユーザーの入力を保持しておくための処理 -->
            <p class="title__error" style="color:red">{{ $errors->first('tag.tag_name') }}</p> <!-- バリデーションエラーを取得＆表示(こだわり：バリデーション文を全て日本語に変換（validation.php内）) -->
            <input class="input submit-input" type="submit" value="作成"/>
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/selecttag">戻る</a>
    </div>
@endsection