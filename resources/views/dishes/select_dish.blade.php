@extends('layouts.app')

@section('content')
    <h1 class='title'>選択した気分「{{ $tag->tag_name }}」</h1>
    <h2 class='sub_title'>紹介したい料理名を選んでね</h2>
    <div class="justify-content">
        <a class="box-shadow box-shadow-selectdish" href="/tags/{{ $tag->id }}/createdish">自分で料理名を作成</a>
    </div>
    <div class='dishes'>
        @foreach ($dishes as $dish)
            <div class="bubble-field">
                <div class="item shake{{ $dish->id }}">
                    <a href="/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="side-by-side">
        <a href="/selecttag">タグを選び直す</a>
    </div>
    <div class='paginate'>
        {{ $dishes->links() }}
    </div>
@endsection