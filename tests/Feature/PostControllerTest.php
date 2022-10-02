<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Post;

class PostControllerTest extends TestCase
{
    use DatabaseMigrations;
    // 各テストケースごとにDBを初期化（RefreshDatabaseを使うと、PKの自動採番がリセットされない）

    /**
     * 投稿作成ユーザーと不正アクセス用のユーザーを作成・認証する
     * 
     * @return $userPost: $userが作成したpostインスタンス
     *      　 $baduser: $userPostに不正リクエストを送るユーザー
     */ 
    public function create_good_and_bad_users()
    {
        // $userを作成
        $user = factory(User::class)->create();
        // $userを認証
        $this->actingAs($user);
        // $userによる投稿の作成
        $userPost = factory(Post::class)->create([
            'url' => 'http://test',
            'dish_id' => 1,
            'user_id' => $user->id,
        ]);
        // $baduserを作成・認証
        $baduser = factory(User::class)->create();
        $this->actingAs($baduser);
        
        return array($userPost, $baduser);
    }
    
    /** @test */
    public function 投稿者以外のURL編集ページへのアクセスを回避できるかテスト()
    {
        [$userPost, $baduser] = $this->create_good_and_bad_users();
        // $baduserによる$userのURL編集画面へのアクセス
        $response = $this->get(action('PostController@editurl', $userPost, $baduser));
        $response->assertViewIs('error');
    }
    
    /** @test */
    public function 投稿者以外の画像編集ページへのアクセスを回避できるかテスト()
    {
        [$userPost, $baduser] = $this->create_good_and_bad_users();
        // $baduserによる$userのURL編集画面へのアクセス
        $response = $this->get(action('PostController@editimg', $userPost, $baduser));
        $response->assertViewIs('error');
    }
    
    /** @test */
    public function 投稿者以外のコメント編集ページへのアクセスを回避できるかテスト()
    {
        [$userPost, $baduser] = $this->create_good_and_bad_users();
        // $baduserによる$userのURL編集画面へのアクセス
        $response = $this->get(action('PostController@editcomment', $userPost, $baduser));
        $response->assertViewIs('error');
    }
    
    /** @test */
    public function 投稿者以外の削除リクエストを回避できるかテスト()
    {
        [$userPost, $baduser] = $this->create_good_and_bad_users();
        // $baduserによる$userの投稿の削除リクエスト
        $response = $this->delete(action('PostController@delete', $userPost, $baduser));
        // 削除されずにnot_foundのviewに遷移するかをチェック
        $response->assertViewIs('error');
    }
}
