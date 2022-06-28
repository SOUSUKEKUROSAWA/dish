@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ気分「{{ $tag->tag_name }}」</h1>
    <form action="/dishes" method="POST">
        @csrf
        <br><h3>料理名を考えてね</h3>
        <div class="justify-content">
            <input class="input url-input" type="text" name="dish[dish_name]" placeholder="短く，わかりやすい料理名を入力" value="{{ old('dish.dish_name') }}" required/>
            <input type="hidden" name="dish[tag_id]" value="{{ $tag->id }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('dish.dish_name') }}</p>
            <input class="input submit-input" type="submit" value="作成"/>
        </div>
    </form>
    <div class="side-by-side">
        <a href="/tags/{{ $tag->id }}">既存の料理名から選ぶ</a>
    </div>
@endsection