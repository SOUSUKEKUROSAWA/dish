@extends('layouts.app')

@section('content')
    <script type="module" src="https://unpkg.com/x-frame-bypass"></script>
    <h1 class='title'>「{{ $dish->dish_name }}」の投稿一覧</h1>
    <div id='openpreview' data-posts='{{json_encode($posts)}}'></div>
    <div class="side-by-side">
        <a class="btn btn-middle" href="/searchtag/tags/{{ $dish->tag_id }}">料理を選び直す</a>
        <a class="btn btn-primary" href="/selecttag">料理を他の人に紹介してみる</a>
    </div>
@endsection