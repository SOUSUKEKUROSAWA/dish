@extends('layouts.app')

@section('content')
    <script type="module" src="https://unpkg.com/x-frame-bypass"></script>
    <h1 class='title'>「{{ $dish->dish_name }}」の投稿一覧</h1>
    <div id='openpreview' data-posts='{{json_encode($posts)}}'></div>
    <div class="side-by-side">
        <div class="back">
            <a href="/searchtag/tags/{{ $dish->tag_id }}">料理を選び直す</a>
        </div>
        <div class='posting'>
            <a href="/selecttag">料理を他の人に紹介してみる</a>
        </div>
    </div>    
@endsection