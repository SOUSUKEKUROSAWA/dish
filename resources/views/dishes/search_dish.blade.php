@extends('layouts.app')

@section('content')
    <h1 class='title'>{{ $tag->tag_name }}</h1>
    <h2 class='sub_title'>料理名を選択</h2>
    <div class='dishes'>
        @foreach ($dishes as $dish)
            <h2 class='dish'>
                <a href="/searchdish/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
            </h2>
        @endforeach
    </div>
    {{--<h2 class='change'>
        <a href="">迷って決められない！</a>
    </h2>--}}
    <div class="back">
        <a href="/searchtag">今日の気分を選び直す</a>
    </div>
    <div class='posting'>
        <a href="/selecttag">料理を他の人に紹介してみる</a>
    </div>
    {{--<div class='paginate'>
        {{ $dishes->links() }}
    </div>--}}
@endsection