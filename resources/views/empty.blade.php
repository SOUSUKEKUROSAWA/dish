@extends('layouts.app')

@section('content')
    @if ($viewType=="tag")
    <h1 class='title'>選択した気分「{{ $tag->tag_name }}」</h1>
    @else
    <h1 class='title'>選択した気分「{{ $dish->dish_name }}」</h1>
    @endif
    <div class="justify-content">
        <h3 class="guide">ここにはまだ投稿がありません</h3>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <div class="side-by-side">
        @if ($viewType=="tag")
        <a class="btn btn-middle" href="/tags/searchtag">今の気分を選び直す</a>
        <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/createdish">このタグの投稿に協力する</a> <!-- コントローラから選択したtagのidを渡されているため，料理名作成に直接移動可能 -->
        @else
        <a class="btn btn-middle" href="/tags/{{ $dish->tag_id }}/dishes/searchdish">料理を選び直す</a>
        <a class="btn btn-middle" href="/dishes/{{ $dish->id }}/posts/posturl">この料理の投稿に協力する</a>
        @endif
    </div>
@endsection