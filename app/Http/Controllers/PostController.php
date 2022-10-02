<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;

use App\Post;
use App\Http\Requests\PosturlRequest;
use App\Http\Requests\PostcommentRequest;
use App\Http\Requests\PostImageRequest;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Post Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーではレシピサイトについての投稿(postsテーブル内のリソース)
    | に対する処理を行います．後半にはマイページでの処理を記述しています．
    |
    */
    
    /**
     * ユーザーにより入力されたURLをDBに保存する
     */ 
    public function storeurl(Post $post, PosturlRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id . '/postimg' );
    }

    /**
     * 画像投稿画面を表示する
     */
    public function postimg(Post $post)
    {
        return view('posts/post_img')->with([ 'post' => $post ]);
    }

    /**
     * ユーザーにより入力された画像ファイルをAWSのS3サーバに保存し，
     * その画像へのパスをDBへ保存する
     */
    public function storeimg(Post $post, PostImageRequest $request)
    {
        $img = $request->file('post.img_path');
        // 画像ファイルが入力されていれば、S3バケットの`/`フォルダに保存
        if (isset($img)) {
            $path = Storage::disk('s3')->putFile('/', $img, 'public');
            // S3へ画像ファイルが保存されていれば，DBに画像パスを保存
            if ($path) {
                $post->img_path = $path;
                $post->save();
            }
        }
        return redirect('/posts/' . $post->id . '/postcomment');
    }
    
    /**
     * コメント投稿画面を表示する
     */
    public function postcomment(Post $post)
    {
        return view('posts/post_comment')->with([ 'post' => $post ]);
    }

    /**
     * ユーザーにより入力されたコメントをDBに保存する
     */ 
    public function storecomment(Post $post, PostcommentRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    
    /*--- マイページ用 -------------------------------------------------------*/
    /**
     * URL編集画面を表示する
     */
    public function editurl(Post $post)
    {
        return view('posts/edit_url')->with(['post' => $post]);
    }
    
    /**
     * 保存していたURLをユーザーにより入力されたURLへ更新する
     */ 
    public function updateurl(Post $post, PosturlRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    
    /**
     * URL編集画面を表示する
     */
    public function editimg(Post $post)
    {
        return view('posts/edit_img')->with(['post' => $post]);
    }
    
    /**
     * ユーザーにより入力された画像ファイルをAWSのS3サーバに保存し，
     * 保存していた画像へのパスをユーザーにより入力された画像へのパスへ更新する
     */ 
    public function updateimg(Post $post, PostImageRequest $request)
    {
        $img = $request->file('post.img_path');
        // 画像ファイルが入力されていれば、S3バケットの`/`フォルダに保存
        if (isset($img)) {
            // S3から元の画像を削除
            Storage::disk('s3')->delete($post->img_path);
            // S3へ新しい画像を保存
            $path = Storage::disk('s3')->putFile('/', $img, 'public');
            // S3へ画像ファイルがされていれば，DBの画像パスを更新
            if ($path) {
                $post->img_path = $path;
                $post->save();
            }
        }
        return redirect('/users/myindex');
    }
    
    /**
     * コメント編集画面を表示する
     */
    public function editcomment(Post $post)
    {
        return view('posts/edit_comment')->with(['post' => $post]);
    }
    
    /**
     * 保存していたコメントをユーザーにより入力されたコメントへ更新する
     */ 
    public function updatecomment(Post $post, PostcommentRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users/myindex');
    }
    
    /**
     * 自身の投稿を削除する(S3に保存した画像も削除する)
     */ 
    public function delete(Post $post, Request $request)
    {
        // 投稿者による削除リクエストの場合，削除を実行
        if ($request->user()->id === $post->user_id) {
            // DBからimg_pathのデータを削除
            $post->delete();
            // S3から画像を削除
            Storage::disk('s3')->delete($post->img_path);
            return redirect('/users/myindex');
        } else {
            // 投稿者以外による削除リクエストの場合，エラービューを表示する
            return view('error');
        }
    }
    /*------------------------------------------------------------------------*/
}
