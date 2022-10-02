<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\User;

class GoogleLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Google Login Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーではGoogleのユーザー情報を用いて認証を行います．
    | ここでは，このアプリにGoogleアカウントが登録されていればログイン処理を，
    | 登録されていなければパスワードを自動で生成し新規登録処理を行います．
    |
    */
    
    /**
     * Googleのアカウント選択画面(GCPで自身が設定したURI)へリダイレクトする
     */ 
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Googleのユーザー情報を取得し，ログインもしくは新規登録を自動で行う
     */ 
    public function authGoogleCallback()
    {
        // emailが合致するGoogleユーザー情報を取得
        $googleUser = Socialite::driver('google')->stateless()->user();
        // ユーザー情報のDBへの保存
        $user = User::firstOrCreate([
            // ユーザー情報が存在した場合
            'email' => $googleUser->email
        ], [
            // ユーザー情報が存在しなかった場合
            'name' => $googleUser->name,
            'email_verified_at' => now(),
            'password' => \Hash::make(uniqid()), // 新規登録の場合はパスワードを自動生成
        ]);
        // ログイン
        Auth::login($user, true);
        return redirect('/');
    }
}