@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>どんな気分の人に紹介する？</h1>
        <div class="justify-content">
            <a class="box-shadow box-shadow-selecttag" href="/createtag">自分でタグを作成</a>
        </div>
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class="bubble-field">
                    <div class="item shake{{ $tag->id }}">
                        <a href="/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </div>
@endsection