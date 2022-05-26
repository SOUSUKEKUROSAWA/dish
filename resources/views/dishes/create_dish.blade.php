@extends('layouts.app')

@section('content')
    <h1 class='title'>{{ $tag->tag_name }}</h1>
    <form action="/dishes" method="POST">
        @csrf
        <div class="title">
            <h2>料理名</h2>
            <input type="text" name="dish[dish_name]" placeholder="短く，わかりやすい料理名を入力" value="{{ old('dish.dish_name') }}"/>
            <input type="hidden" name="dish[tag_id]" value="{{ $tag->id }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('dish.dish_name') }}</p>
        </div>
        <input type="submit" value="作成"/>
    </form>
    <div class="back">
        <a href="/tags/{{ $tag->id }}">既存の料理名から選ぶ</a>
    </div>
@endsection

<!--<!DOCTYPE html>-->
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>気分deご飯</title>-->
        <!-- Fonts -->
<!--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1 class='title'>{{ $tag->tag_name }}</h1>-->
<!--        <form action="/dishes" method="POST">-->
<!--            @csrf-->
<!--            <div class="title">-->
<!--                <h2>料理名</h2>-->
<!--                <input type="text" name="dish[dish_name]" placeholder="短く，わかりやすい料理名を入力" value="{{ old('dish.dish_name') }}"/>-->
<!--                <input type="hidden" name="dish[tag_id]" value="{{ $tag->id }}"/>-->
<!--                <p class="title__error" style="color:red">{{ $errors->first('dish.dish_name') }}</p>-->
<!--            </div>-->
<!--            <input type="submit" value="作成"/>-->
<!--        </form>-->
<!--        <div class="back">-->
<!--            <a href="/tags/{{ $tag->id }}">既存の料理名から選ぶ</a>-->
<!--        </div>-->
<!--    </body>-->
<!--</html>-->