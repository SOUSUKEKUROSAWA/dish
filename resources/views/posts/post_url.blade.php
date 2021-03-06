@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $dish->dish_name }}」</h1>
    
    <h2 class='guide'>サイトのURLを教えてね</h2>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/url" method="POST">
        @csrf
        <div class="justify-content input-field">
            <div>
                <input class="input url-input" type="url" name="post[url]" placeholder="ここにURLをコピー＆ペーストしてね" value="{{ old('post.url') }}"/>
                <p class="title__error centreren" style="color:red">{{ $errors->first('post.url') }}</p>
            </div>
            <input class="input submit-input" type="submit" value="登録"/>
        </div>
        
        <input type="hidden" name="post[dish_id]" value="{{ $dish->id }}"/>
        <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}"/> <!-- Authファサードを利用し，コントローラでインスタンス化して手渡さなくてもユーザー情報が使える -->
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/tags/{{ $dish->tag_id }}/dishes/selectdish">料理を選び直す</a>
    </div>
@endsection