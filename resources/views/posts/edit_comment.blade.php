@extends('layouts.app')

@section('content')
    <h1 class="title">コメントを直してね</h1>
    <form action="/posts/comment/{{ $post->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="justify-content">
            <textarea class="textarea" name="post[comment]" rows="5" cols="40" placeholder="レシピのポイント・自己流アレンジなどあれば" value="{{ old('post.comment') }}"></textarea>
            <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
        </div>
        <div class="justify-content">
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
@endsection