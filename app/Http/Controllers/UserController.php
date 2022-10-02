<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーではマイページの一覧表示を行います
    |
    */

    /**
     * マイページの一覧を表示する
     */
    public function myindex(User $user)
    {
        return view('users/myindex')->with(['own_posts' => $user->getOwnPaginateByLimit() ]);
    }
}
