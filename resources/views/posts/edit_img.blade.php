@extends('layouts.app')

@section('content')
    <h1 class="title">編集画面</h1>
    <form action="/posts/img/{{ $post->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="justify-content">
            <input class="input url-input" type="file" name="post[img_path]">
        </div>
        <div class="justify-content">
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
@endsection