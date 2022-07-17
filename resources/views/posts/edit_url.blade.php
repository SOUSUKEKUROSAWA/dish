@extends('layouts.app')

@section('content')
    <h1 class="guide">URLを直してね</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/{{ $post->id }}/url/update" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-content input-field">
            <div>
                <input class="input url-input" type="url" name="post[url]" placeholder="ここにURLをコピー＆ペーストしてね" value="{{ old('post.url') }}"/>
                <p class="title__error centreren" style="color:red">{{ $errors->first('post.url') }}</p>
            </div>
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/users/myindex">一覧に戻る</a>
    </div>
@endsection