<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PosturlRequest;
use App\Http\Requests\PostcommentRequest;
use App\Http\Requests\PostImageRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /*--- 投稿用 --------------------------------------------------------------------------------------------*/
    public function storeurl(Post $post, PosturlRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id . '/postimg' );
    }

    public function postimg(Post $post)
    {
        return view('posts/post_img')->with([ 'post' => $post ]);
    }

    public function storeimg(Post $post, PostImageRequest $request)
    {
        $img = $request->file('post.img_path');
        
        /*--- S3のサーバに画像を保存する場合 ---*/
        if (isset($img)) { // 画像情報がセットされていれば、S3バケットの`/`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/', $img, 'public');
            
            if ($path) { // アップロードが実行できたら，DBに保存処理を実行
                $post->img_path = $path; // アップロードした画像のパスを取得
                $post->save();
            }
        }
        /*---------------------------------------*/
        
        /*--- EC2のサーバに画像を保存する場合 ---*/
        // if (isset($img)) { // 画像情報がセットされていれば、保存処理を実行
        //     $path = $img->store('public/img');
            
        //     if ($path) { // store処理が実行できたらDBに保存処理を実行
        //         $input = $request['post'];
        //         $post->fill($input)->save();
        //     }
        // }
        /*---------------------------------------*/
        
        return redirect('/posts/' . $post->id . '/postcomment');
    }
    
    public function postcomment(Post $post)
    {
        return view('posts/post_comment')->with([ 'post' => $post ]);
    }

    public function storecomment(Post $post, PostcommentRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    /*-------------------------------------------------------------------------------------------------------*/
    
    /*--- 編集・削除用 ---------------------------------------------------------*/
    public function editurl(Post $post)
    {
        return view('posts/edit_url')->with(['post' => $post]);
    }
    
    public function updateurl(Post $post, PosturlRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    
    public function editimg(Post $post)
    {
        return view('posts/edit_img')->with(['post' => $post]);
    }
    
    public function updateimg(Post $post, PostImageRequest $request)
    {
        $img = $request->file('post.img_path');
        
        /*--- S3のサーバに画像を保存する場合 ---*/
        if (isset($img)) { // 画像情報がセットされていれば、S3バケットの`/`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('/', $img, 'public');
            
            if ($path) { // アップロードが実行できたら，DBに保存処理を実行
                $post->img_path = $path; // アップロードした画像のパスを取得
                $post->save();
            }
        }

        return redirect('/users/myindex');
    }
    
    public function editcomment(Post $post)
    {
        return view('posts/edit_comment')->with(['post' => $post]);
    }
    
    public function updatecomment(Post $post, PostcommentRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    
    public function delete(Post $post)
    {
        $post->delete(); // DBからimg_pathのデータを削除
        Storage::disk('s3')->delete($post->img_path); // S3から画像を削除
        return redirect('/users/myindex');
    }
    /*--------------------------------------------------------------------------*/
}
