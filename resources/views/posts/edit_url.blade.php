@extends('layouts.app')

@section('content')
    <h1 class="title">編集画面</h1>
    
    <form action="/posts/url/{{ $post->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-content">
            <input class="input url-input" type="text" name="post[url]" placeholder="ここにURLをコピー＆ペーストしてね" value="{{ old('post.url') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.url') }}</p>
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
@endsection