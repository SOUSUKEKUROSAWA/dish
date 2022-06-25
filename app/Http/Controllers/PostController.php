<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PosturlRequest;
use App\Http\Requests\PostcommentRequest;

class PostController extends Controller
{
    public function storeurl(Post $post, PosturlRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/img/' . $post->id );
    }

    public function postimg(Post $post)
    {
        return view('posts/post_img')->with([ 'post' => $post ]);
    }

    public function updateimg(Post $post, PostcommentRequest $request)
    {
        $img = $request->file('post.img_path');
        
        // 画像情報がセットされていれば、保存処理を実行
        if (isset($img)) {
            $path = $img->store('public/img');
            
            // store処理が実行できたらDBに保存処理を実行
            if ($path) {
                $input = $request['post'];
                $post->fill($input)->save();
            }
        }
        
        return redirect('/posts/comment/' . $post->id);
    }
    
    public function postcomment(Post $post)
    {
        return view('posts/post_comment')->with([ 'post' => $post ]);
    }

    public function updatecomment(Post $post, PostcommentRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/');
    }
}
