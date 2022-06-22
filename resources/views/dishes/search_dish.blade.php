@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>今の気分「{{ $tag->tag_name }}」</h1>
        <h2 class='sub_title'>気になる料理名を選んでね</h2>
        <div class="justify-content">
            <a class="box-shadow box-shadow-searchdish" href="/tags/{{ $tag->id }}/dishes/randomdish">迷って決められない！</a>
        </div>
        <div class='dishes'>
            @foreach ($dishes as $dish)
                <div class="bubble-field">
                    <div class="item shake{{ $dish->id }}">
                        <a href="/searchdish/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
                    </div>
                </div>
            @endforeach
            <!--@for ($i = 0; $i < count($dishes); $i++)-->
            <!--    <div class="field">-->
            <!--        <div class="item shake{{ $i }}">-->
            <!--            <h3 class='dish'>-->
            <!--                <a href="/searchdish/dishes/{{ $dishes[$i]->id }}">{{ $dishes[$i]->dish_name }}</a>-->
            <!--            </h3>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--@endfor-->
        </div>
    </div>
    <div class="side-by-side">
        <div class="back">
            <a href="/searchtag">今日の気分を選び直す</a>
        </div>
        <div class='posting'>
            <a href="/selecttag">料理を他の人に紹介してみる</a>
        </div>
    </div>
    <div class='paginate'>
        {{ $dishes->links() }}
    </div>
@endsection