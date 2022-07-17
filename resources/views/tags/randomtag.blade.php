@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='guide'>こんな気分でいいんじゃない？</h1>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        
        <a class="btn btn-middle" href="/tags/randomtag">う～ん...なんか違う</a> <!-- 再度ランダム取得を実行 -->
        
        <div class="justify-content">    
            <div class="bubble-field">
                <div class="item shake{{ $randomtag->id }}">
                    <a class="btn bubble-name" href="/tags/{{ $randomtag->id }}/dishes/searchdish">{{ $randomtag->tag_name }}</a>
                </div>
            </div>
        </div>
        
        <div class="side-by-side">
            <a class="btn btn-middle" href="/tags/searchtag">やっぱり自分で選ぶ</a>
            <a class="btn btn-middle" href="/tags/selecttag">料理を他の人に紹介してみる</a>
        </div>
    </div>
@endsection