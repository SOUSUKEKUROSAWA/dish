@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    <h2 class="guide">コメントを入力してね</h3>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <form action="/posts/comment/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-field">
            <textarea class="textarea" name="post[comment]" rows="5" cols="40" placeholder="レシピのポイント・自己流アレンジなどあれば" value="{{ old('post.comment') }}"></textarea>
            <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
            <input class="input submit-input btn-primary" type="submit" value="投稿"/>
            <input class="input submit-input btn-secondary" type="submit" value="コメントを入力せずに投稿"/>
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