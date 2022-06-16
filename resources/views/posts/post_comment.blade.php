@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <h3><br>コメントを入力してね</h3>
        <div class="justify-content">
            <textarea class="textarea" name="post[comment]" placeholder="レシピのポイント・自己流アレンジなどあれば" value="{{ old('post.comment') }}"></textarea>
            <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
        </div>
        <div class="justify-content">
            <input class="input submit-input" type="submit" value="投稿"/>
        </div>
    </form>
    <h3><br>{{Auth::user()->name}}さんの紹介のおかげで<br>このサービスがより良いものになりました．<br>ありがとう！</h3>
@endsection