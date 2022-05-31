@extends('layouts.app')

@section('content')
    <h1 class='title'>どんな人に紹介する？</h1>
    <h2 class='sub_title'>~今，みんなはこんな気分です~</h2>
    <h2 class='create_tag'>
        <a href="/createtag">自分でタグを作成</a>
    </h2>
    <div class='tags'>
        @foreach ($tags as $tag)
            <h2 class='tag'>
                <a href="/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>
            </h2>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $tags->links() }}
    </div>
@endsection