@extends('layouts.app')

@section('content')
    <h1 class="guide">URLを直してね</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <form action="/posts/url/{{ $post->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-content input-field">
            <input class="input url-input" type="url" name="post[url]" placeholder="ここにURLをコピー＆ペーストしてね" value="{{ old('post.url') }}" required/>
            <p class="title__error" style="color:red">{{ $errors->first('post.url') }}</p>
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/myindex">一覧に戻る</a>
    </div>
@endsection