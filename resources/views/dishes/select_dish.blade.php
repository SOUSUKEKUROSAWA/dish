@extends('layouts.app')

@section('content')
    <h1 class='title'>{{ $tag->tag_name }}</h1>
    <h2 class='sub_title'>紹介したい料理名を選択</h2>
    <h2 class='create_dish'>
        <a href="/tags/{{ $tag->id }}/createdish">自分で料理名を作成</a>
    </h2>
    <div class='dishes'>
        @foreach ($dishes as $dish)
            <div class="field">
                <div class="item shake{{ $dish->id }}">
                    <h3 class='dish'>
                        <a href="/dishes/{{ $dish->id }}">{{ $dish->dish_name }}</a>
                    </h3>
                </div>
            </div>
        @endforeach
    </div>
    <div class="back">
        <a href="/selecttag">タグを選び直す</a>
    </div>
    {{--<div class='paginate'>
        {{ $dishes->links() }}
    </div>--}}
@endsection