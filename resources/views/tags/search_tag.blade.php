@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1 class='guide'>今の気分に一番合うものを選んでね</h1>
        <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
        
        <div class="justify-content margin-bottom">
            <a class="btn btn-middle" href="/tags/randomtag">選ぶのもめんどくさ～い</a>
        </div>
        
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class="bubble-field">
                    <div class="item shake{{ $tag->id }}"> <!-- classにidを渡すことで，CSSにidを参照させて，バブルの振動数を決定する（bubble.scss） -->
                        <a class="btn bubble-name" href="/tags/{{ $tag->id }}/dishes/searchdish">{{ $tag->tag_name }}</a> <!-- URIで，選択されたタグのidをweb.phpに渡す -->
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="justify-content">
            <a class="btn btn-middle" href="/tags/selecttag">料理を他の人に紹介してみる</a>
        </div>
        
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </div>
@endsection