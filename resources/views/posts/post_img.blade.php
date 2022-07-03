@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    <div class="justify-content">
        <div class="guide">
            <h3>画像をアップロードしてね</h3>
            <p>(サイトのスクリーンショットなど)</p>
        </div>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <form action="/posts/img/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-field">
            <input class="input img-input" type="file" name="post[img_path]">
            <input class="input submit-input btn-primary" type="submit" value="アップロード"/>
            <input class="input submit-input btn-secondary" type="submit" value="アップロードせずに次へ"/>
        </div>
    </form>
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/url/{{ $post->id }}/editer">URLを登録し直す</a>
    </div>
@endsection