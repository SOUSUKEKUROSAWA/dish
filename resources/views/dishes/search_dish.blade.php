@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>今の気分「{{ $tag->tag_name }}」</h1>
        <h2 class='guide'>気になる料理名を選んでね</h2>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        
        <div class="justify-content margin-bottom">
            <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/randomdish">迷って決められな～い</a>
        </div>
        
        <div class='dishes'>
            @foreach ($dishes as $dish)
                <div class="bubble-field">
                    <div class="item shake{{ $dish->id }}">
                        <a class="btn bubble-name" href="/searchdish/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
                    </div>
                </div>
            @endforeach
            
            <!--- この書き方でも表現可能 ------------------------------------------------------------------------------>
            <!--@for ($i = 0; $i < count($dishes); $i++)-->
            <!--    <div class="field">-->
            <!--        <div class="item shake{{ $i }}">-->
            <!--            <h3 class='dish'>-->
            <!--                <a href="/searchdish/dishes/{{ $dishes[$i]->id }}">{{ $dishes[$i]->dish_name }}</a>-->
            <!--            </h3>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--@endfor-->
            <!--------------------------------------------------------------------------------------------------------->
        </div>
    </div>
    
    <div class="side-by-side">
        <div class="back">
            <a class="btn btn-middle" href="/searchtag">今日の気分を選び直す</a>
        </div>
        <div class='posting'>
            <a class="btn btn-middle" href="/selecttag">料理を他の人に紹介してみる</a>
        </div>
    </div>
    
    <div class='paginate'>
        {{ $dishes->links() }}
    </div>
@endsection