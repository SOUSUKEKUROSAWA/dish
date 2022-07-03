@extends('layouts.app')

@section('content')
    <h1 class='title'>「{{ $dish->dish_name }}」の投稿一覧</h1>
    
    <!--<script type="module" src="https://unpkg.com/x-frame-bypass"></script> <!-- x-frameを使ってサイトのプレビューを実装しようとしたが，うまく表示されなかった -->
    
    <!-- Reactのコンポーネントによってレンダリングする -->
    <div id='openpreview' data-posts='{{json_encode($posts)}}'></div> <!-- データ属性を利用し，postインスタンスをJSON形式に変換したものを，React側で識別できるようにする -->
    
    <div class="side-by-side">
        <a class="btn btn-middle" href="/searchtag/tags/{{ $dish->tag_id }}">料理を選び直す</a>
        <a class="btn btn-primary" href="/selecttag">料理を他の人に紹介してみる</a>
    </div>
@endsection