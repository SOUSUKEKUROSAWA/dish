@extends('layouts.app')

@section('content')
    <script type="module" src="https://unpkg.com/x-frame-bypass"></script>
    <h1 class='title'>{{ $dish->dish_name }}の投稿一覧</h1>
    <div id='openpreview' data-posts='{{json_encode($posts)}}'></div>
    <div class="back">
        <a href="/searchtag/tags/{{ $dish->tag_id }}">料理を選び直す</a>
    </div>
    <div class='posting'>
        <a href="/selecttag">料理を他の人に紹介してみる</a>
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
<!--        <h1 class='title'>{{ $dish->dish_name }}の投稿一覧</h1>-->
<!--        <div class='posts'>-->
<!--            @foreach ($posts as $post)-->
<!--                {{--<h2 class='preview'>-->
<!--                    <a href="{{ $post->url }}">サイトをプレビュー</a>-->
<!--                </h2>--}}-->
<!--                <h2 class='comment'>{{ $post->comment }}</h2>-->
<!--                <h2 class='redirect'>-->
<!--                    <a href="{{ $post->url }}">今日，これ食べよ</a>-->
<!--                </h2>-->
<!--                <div>作成日時：{{ $post->created_at }}</div>-->
<!--            @endforeach-->
<!--        </div>-->
<!--        <div class="back">-->
<!--            <a href="/searchtag/tags/{{ $dish->tag_id }}">料理を選び直す</a>-->
<!--        </div>-->
<!--        <div class='posting'>-->
<!--            <a href="/selecttag">料理を他の人に紹介してみる</a>-->
<!--        </div>-->
<!--        {{--<div class='paginate'>-->
<!--            {{ $dishes->links() }}-->
<!--        </div>--}}-->
<!--    </body>-->
<!--</html>-->