@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    
    <h2 class="guide">コメントを入力してね</h3>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/comment/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT') <!-- 1つ前のpost_url.blade.phpでurlが登録された時点で，commentカラムにはNULLが登録済みのため，POSTではなくPUTにする -->
        <div class="input-field">
            <textarea class="textarea" name="post[comment]" rows="5" cols="40" placeholder="(※140字以下)レシピのポイント・自己流アレンジなどあれば">{{ old('post.comment') }}</textarea>
            <p class="title__error centreren" style="color:red">{{ $errors->first('post.comment') }}</p>
            <input class="input submit-input btn-primary" type="submit" value="投稿"/>
            <input class="input submit-input btn-secondary" type="submit" value="コメントを入力せずに投稿"/>  <!-- NULLABLEであることを明示的にするためのボタン．処理は上のボタンと同じ -->
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/img/{{ $post->id }}">画像をアップロードし直す</a>
    </div>
    
    <div class="justify-content last-comment">
        <div class="guide last-comment-background">
            <h3>{{Auth::user()->name}}さんの紹介のおかげで<br>このサービスがより良いものになりました．<br>ありがとう！</h3>
        </div>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
@endsection