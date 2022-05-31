@extends('layouts.app')

@section('content')
    <h1 class='title'>{{ $dish->dish_name }}</h1>
    <form action="/posts/url" method="POST">
        @csrf
        <div class="title">
            <h2>URL</h2>
            <input type="text" name="post[url]" value="{{ old('post.url') }}"/>
            <input type="hidden" name="post[dish_id]" value="{{ $dish->id }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.url') }}</p>
        </div>
        <input type="submit" value="登録"/>
    </form>
    <div class="back">
        <a href="/tags/{{ $dish->tag_id }}">料理を選び直す</a>
    </div>
@endsection