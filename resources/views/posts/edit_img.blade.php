@extends('layouts.app')

@section('content')
    <h1 class="guide">もう一度画像を選択してね</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <form action="/posts/img/{{ $post->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-field">
            <input class="input img-input" type="file" name="post[img_path]">
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/myindex">一覧に戻る</a>
    </div>
@endsection