@extends('layouts.app')

@section('content')
    <h1 class="guide">エラーが検出されました．1つ前のページに戻ってください．</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <div class="justify-content">
        <h3>考えられる原因</h3>
    </div>
    <div class="justify-content">
        <ul>
            <li>URLが間違っている(404エラー)</li>
            <li>意図しないアクセスが行われた</li>
            <li>不正なリクエストが行われた</li>
        </ul>
    </div>
@endsection