@extends('layouts.app')

@section('content')
    <h1 class='title'>選んだ料理「{{ $post->dish->dish_name }}」</h1>
    <form action="/posts/img/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3><br>よろしければ画像ファイルをアップロードしてください</h3>
        <p class="justify-content">サイトのスクリーンショットなどでも構いません</p>
        <div class="justify-content">
            <input class="input url-input" type="file" name="post[img_path]">
        </div>
        <div class="justify-content">
            <input class="input submit-input" type="submit" value="アップロード"/>
        </div>
    </form>
@endsection