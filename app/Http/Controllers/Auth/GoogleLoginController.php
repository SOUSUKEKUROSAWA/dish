<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect(); // GCPで設定したURIへのリダイレクト
    }

    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user(); // emailが合致するユーザー情報を取得
        
        $user = User::firstOrCreate([
            /*--- ユーザー情報が存在した場合の処理 ---*/
            'email' => $googleUser->email
        ], [
            /*--- ユーザー情報が存在しなかった場合の処理 ---*/
            'name' => $googleUser->name,
            'email_verified_at' => now(),
            'password' => \Hash::make(uniqid()), // 新規登録の場合はパスワードを自動生成
        ]);
        
        Auth::login($user, true); // ログイン処理
        
        return redirect('/'); // ログイン後frontページにリダイレクト
    }
}