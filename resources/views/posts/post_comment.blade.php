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

<!--<!DOCTYPE html>-->
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>気分deご飯</title>-->
        <!-- Fonts -->
<!--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1 class='title'>{{ $post->dish->dish_name }}</h1>-->
<!--        <form action="/posts/{{ $post->id }}" method="POST">-->
<!--            @csrf-->
<!--            @method('PUT')-->
<!--            <div class="title">-->
<!--                <h2>コメント（料理のポイント・自己流アレンジなどあれば）</h2>-->
<!--                <input type="text" name="post[comment]" value="{{ old('post.comment') }}"/>-->
<!--                <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>-->
<!--            </div>-->
<!--            <input type="submit" value="投稿"/>-->
<!--        </form>-->
<!--    </body>-->
<!--</html>-->