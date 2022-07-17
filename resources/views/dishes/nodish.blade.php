@extends('layouts.app')

@section('content')
    <h1 class='title'>選択した気分「{{ $tag->tag_name }}」</h1>
    
    <div class="justify-content">
        <h3 class="guide">ここにはまだ投稿がありません</h3>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <div class="side-by-side">
        <a class="btn btn-middle" href="/tags/searchtag">今日の気分を選び直す</a>
        <a class="btn btn-middle" href="/tags/{{ $tag->id }}/dishes/createdish">このタグの投稿に協力する</a> <!-- コントローラから選択したtagのidを渡されているため，料理名作成に直接移動可能 -->
    </div>
@endsection