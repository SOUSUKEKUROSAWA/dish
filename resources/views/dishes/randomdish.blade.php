@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='guide'>この料理でいいんじゃない？</h1>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        
        <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/randomdish">うーん，なんか違う...</a>
        
        <div class="justify-content">
            <div class="bubble-field">
                <div class="item shake{{ $randomdish->id }}">
                    <a class="btn bubble-name" href="/dishes/{{ $randomdish->id }}/posts/searchpost">{{ $randomdish->dish_name }}</a>
                </div>
            </div>
        </div>
        
        <div class="side-by-side">
            <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/searchdish">やっぱり自分で選ぶ</a>
            <a class="btn btn-middle" href="/tags/selecttag">料理を他の人に紹介してみる</a>
        </div>
    </div>
@endsection