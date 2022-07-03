@extends('layouts.app')

@section('content')
    <div class="justify-content">
        <div class="guide">
            <h1>メンテナンス中</h1>
            <p>大変申し訳ございません<br><br><u>現在，パスワードの再設定はできない状態になっています．</u><br><br>パスワードを忘れてしまった際は，お手数ですがもう一度，別のメールアドレス，もしくはGoogleアカウントで新規登録を行ってください．</p>
        </div>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <div class="justify-content">
        <a class="btn btn-middle" href="{{ route('register') }}">アカウントを新規登録</a>
    </div>
@endsection