@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $dish->dish_name }}」</h1>
    <form action="/posts/url" method="POST">
        @csrf
        <div class="justify-content">
            <input class="input url-input" type="text" name="post[url]" placeholder="ここにURLをコピー＆ペーストしてね" value="{{ old('post.url') }}"/>
            <input type="hidden" name="post[dish_id]" value="{{ $dish->id }}"/>
            <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.url') }}</p>
            <input class="input submit-input" type="submit" value="登録"/>
        </div>
    </form>
    <div class="side-by-side">
        <a class="select-dish-again" href="/tags/{{ $dish->tag_id }}">料理を選び直す</a>
    </div>
@endsection