@extends('layouts.app')

@section('content')
    <h1 class="guide">エラーが検出されました．1つ前のページに戻ってください．</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <div class="justify-content">
        <h3>考えられる原因</h3>
    </div>
    <ul>
        <li>意図しないアクセスが行われた</li>
        <li>不正なリクエストが行われた</li>
    </ul>
@endsection