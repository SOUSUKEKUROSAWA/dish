@extends('layouts.app')

@section('content')
    <h1 class='title'>今，どんな気分？</h1>
    <div class='tags'>
        @foreach ($tags as $tag)
            <h2 class='tag'>
                <a href="/searchtag/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>
            </h2>
        @endforeach
    </div>
    {{--<h2 class='change'>
        <a href="">シャッフル</a>
    </h2>--}}
    <div class='posting'>
        <a href="/selecttag">料理を他の人に紹介してみる</a>
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
<!--        <h1 class='title'>今，どんな気分？</h1>-->
<!--        <div class='tags'>-->
<!--            @foreach ($tags as $tag)-->
<!--                <h2 class='tag'>-->
<!--                    <a href="/searchtag/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>-->
<!--                </h2>-->
<!--            @endforeach-->
<!--        </div>-->
<!--        {{--<h2 class='change'>-->
<!--            <a href="">シャッフル</a>-->
<!--        </h2>--}}-->
<!--        <div class='posting'>-->
<!--            <a href="/selecttag">料理を他の人に紹介してみる</a>-->
<!--        </div>-->
<!--        <div class='paginate'>-->
<!--            {{ $tags->links() }}-->
<!--        </div>-->
<!--    </body>-->
<!--</html>-->