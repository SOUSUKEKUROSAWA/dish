@extends('layouts.app')

@section('content')
<div class="justify-content">
    <div class="guide">
        <h1>また来てくれてありがとう！</h1>
        <h3><u>Googleでログイン</u>が楽ちんだよ</h3>
    </div>
</div>
<img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body">
                    <div class="form-group row mt-2">
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-middle" href="/auth/redirect" class="btn btn-primary" role="button">
                                Googleでログイン
                            </a>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Eメールのアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">この情報を記録する</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">いざ，ログイン！</button>

                                @if (Route::has('password.request'))
                                    <!--<a class="btn bubble-name" href="{{ route('password.request') }}">-->
                                    <!--    パスワードを忘れてしまいましたか？-->
                                    <!--</a>-->
                                    <a class="btn bubble-name" href="/underdevelopment">
                                        パスワードを忘れてしまいましたか？
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
