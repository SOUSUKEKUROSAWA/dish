@extends('layouts.app')

@section('content')
    <h1 class='title'>{{ $post->dish->dish_name }}</h1>
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="title">
            <h2>コメント（料理のポイント・自己流アレンジなどあれば）</h2>
            <input type="text" name="post[comment]" value="{{ old('post.comment') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
        </div>
        <input type="submit" value="投稿"/>
    </form>
@endsection