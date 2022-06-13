@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='title'>今の気分に一番合うものを選んでね</h1>
        <div class="justify-content">
            <a class="box-shadow box-shadow-searchtag" href="">選ぶのもめんどくさい！</a>
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
        <a class="to-selecttag" href="/selecttag">料理を他の人に紹介してみる</a>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </div>
@endsection