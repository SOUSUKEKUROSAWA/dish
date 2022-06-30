@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='guide'>今の気分に一番合うものを選んでね</h1>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        <div class="justify-content">
            <a class="btn btn-middle" href="/tags/randomtag">選ぶのもめんどくさいときは...</a>
        </div>
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class="bubble-field">
                    <div class="item shake{{ $tag->id }}">
                        <a href="/searchtag/tags/{{ $tag->id }}">{{ $tag->tag_name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="justify-content">
            <a class="btn btn-middle" href="/selecttag">料理を他の人に紹介してみる</a>
        </div>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </div>
@endsection