@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    
    <div class="justify-content">
        <div class="guide">
            <h3>画像をアップロードしてね</h3>
            <p>(サイトのスクリーンショットなど)</p>
        </div>
    </div>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/img/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- 1つ前のpost_url.blade.phpでurlが登録された時点で，img_pathカラムにはNULLが登録済みのため，POSTではなくPUTにする -->
        <div class="input-field">
            <div>
                <input class="img-input" type="file" name="post[img_path]">
                <p class="title__error centreren" style="color:red">{{ $errors->first('post.img_path') }}</p>
            </div>
            <input class="input submit-input btn-primary" type="submit" value="アップロード"/>
            <input class="input submit-input btn-secondary" type="submit" value="アップロードせずに次へ"/> <!-- NULLABLEであることを明示的にするためのボタン．処理は上のボタンと同じ -->
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-tools" href="https://saruwakakun.com/tools/image-resize/" target="_blank">サイズを縮小</a>
        <a class="btn btn-tools" href="https://www.iloveimg.com/ja/convert-to-jpg" target="_blank">JPEGへ変換</a>
    </div>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/url/{{ $post->id }}/editer">URLを登録し直す</a> <!-- post_url.blade.phpに戻ってしまうとPOSTメソッドが実行されて新たにidが割り振られてしまうので，編集画面に移動させてPUTメソッドが実行されるようにしている -->
    </div>
@endsection