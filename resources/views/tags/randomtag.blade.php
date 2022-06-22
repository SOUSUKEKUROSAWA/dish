@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>こんな気分ではないですか？</h1>
        <div class="justify-content">    
            <div class="bubble-field">
                <div class="item shake{{ $randomtag->id }}">
                    <a href="/searchtag/tags/{{ $randomtag->id }}">{{ $randomtag->tag_name }}</a>
                </div>
            </div>
        </div>
        <div class="justify-content">
            <a class="box-shadow box-shadow-searchtag" href="/tags/randomget">こんな気分じゃない！</a>
        </div>
        <a class="to-selecttag" href="/searchtag">やっぱり自分で選ぶ<br><br></a>
        <a class="to-selecttag" href="/selecttag">料理を他の人に紹介してみる</a>
    </div>
@endsection