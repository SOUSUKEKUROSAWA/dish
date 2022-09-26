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

    /** @test */
    public function 投稿者以外の削除リクエストを回避できるかテスト()
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
        // $baduserによる$userの投稿の削除リクエスト
        $response = $this->delete(action('PostController@delete', $userPost, $baduser));
        // 削除されずにnot_foundのviewに遷移するかをチェック
        $response->assertViewIs('not_found');
    }
}
