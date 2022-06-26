@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>この料理でいいんじゃない？</h1>
        <!--<img id="top-image" src="./img/c5caaa1a.png">-->
        <div class="justify-content">    
            <div class="bubble-field">
                <div class="item shake{{ $randomdish->id }}">
                    <a href="/searchdish/dishes/{{ $randomdish->id }}">{{ $randomdish->dish_name }}</a>
                </div>
            </div>
        </div>
        <div class="justify-content">
            <a class="box-shadow box-shadow-searchtag" href="/tags/{{ $tag->id }}/dishes/randomdish">うーん，なんか違う...</a>
        </div>
        <a class="to-selecttag" href="/searchtag/tags/{{ $tag->id }}">やっぱり自分で選ぶ<br><br></a>
        <a class="to-selecttag" href="/selecttag">料理を他の人に紹介してみる</a>
    </div>
@endsection