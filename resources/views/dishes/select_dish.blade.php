@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>選択した気分「{{ $tag->tag_name }}」</h1>
        <h2 class='guide'>紹介したい料理名を選んでね</h2>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        <div class="justify-content">
            <a class="btn btn-middle" href="/tags/{{ $tag->id }}/createdish">自分で料理名を作成</a>
        </div>
        <div class='dishes'>
            @foreach ($dishes as $dish)
                <div class="bubble-field">
                    <div class="item shake{{ $dish->id }}">
                        <a class="btn bubble-name" href="/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="side-by-side">
            <a class="btn btn-middle" href="/selecttag">タグを選び直す</a>
        </div>
        <div class='paginate'>
            {{ $dishes->links() }}
        </div>
    </div>
@endsection