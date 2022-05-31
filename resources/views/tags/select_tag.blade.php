@extends('layouts.app')

@section('content')
    <h1 class='title'>どんな人に紹介する？</h1>
    <h2 class='sub_title'>~今，みんなはこんな気分です~</h2>
    <h2 class='create_tag'>
        <a href="/createtag">自分でタグを作成</a>
    </h2>
    <div class='tags'>
        @foreach ($tags as $tag)
            <h2 class='tag'>
                <a href="/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>
            </h2>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $tags->links() }}
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
<!--        <h1 class='title'>どんな人に紹介する？</h1>-->
<!--        <h2 class='sub_title'>~今，みんなはこんな気分です~</h2>-->
<!--        <h2 class='create_tag'>-->
<!--            <a href="/createtag">自分でタグを作成</a>-->
<!--        </h2>-->
<!--        <div class='tags'>-->
<!--            @foreach ($tags as $tag)-->
<!--                <h2 class='tag'>-->
<!--                    <a href="/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>-->
<!--                </h2>-->
<!--            @endforeach-->
<!--        </div>-->
<!--        <div class='paginate'>-->
<!--            {{ $tags->links() }}-->
<!--        </div>-->
<!--    </body>-->
<!--</html>-->