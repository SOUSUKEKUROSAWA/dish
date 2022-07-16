@extends('layouts.app')

@section('content')
    <h1 class="guide">もう一度画像を選択してね</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/img/{{ $post->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-field">
            <div>
                <input class="img-input" type="file" name="post[img_path]" required/> <!-- ここで何も画像を登録せずに更新ボタンを押してしまうと，元の画像が消えてしまうため，ここにはrequiredが必要 -->
                <p class="title__error centreren" style="color:red">{{ $errors->first('post.img_path') }}</p>
            </div>
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-tools" href="https://saruwakakun.com/tools/image-resize/" target="_blank">サイズを縮小</a>
        <a class="btn btn-tools" href="https://www.iloveimg.com/ja/convert-to-jpg" target="_blank">JPEGへ変換</a>
    </div>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/myindex">一覧に戻る</a>
    </div>
@endsection