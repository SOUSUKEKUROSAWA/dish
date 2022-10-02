@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='guide'>{{Auth::user()->name}}さん，こんにちは！<br>どんな気分の人に紹介する？</h1>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        <div class="justify-content margin-bottom">
            <a class="btn btn-middle" href="/tags/createtag">自分でタグを作成</a>
        </div>
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class="bubble-field">
                    <div class="item shake{{ $tag->id }}">
                        <a class="btn bubble-name" href="/tags/{{ $tag->id }}/dishes/selectdish">{{ $tag->tag_name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </div>
@endsection