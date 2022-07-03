<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function myindex(User $user)
    {
        return view('users/myindex')->with(['own_posts' => $user->getOwnPaginateByLimit() ]); // getOwnPaginateByLimit()はUser.php内で定義
    }
}
