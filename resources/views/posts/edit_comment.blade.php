@extends('layouts.app')

@section('content')
    <h1 class="guide">コメントを直してね</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    
    <form action="/posts/comment/{{ $post->id }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div class="input-field">
            <textarea class="textarea" name="post[comment]" rows="5" cols="40" placeholder="(※140字以下)レシピのポイント・自己流アレンジなどあれば" required>{{ old('post.comment') }}</textarea> <!-- ここで何もコメントを登録せずに更新ボタンを押してしまうと，元のコメントが消えてしまうため，ここにはrequiredが必要 -->
            <p class="title__error centreren" style="color:red">{{ $errors->first('post.comment') }}</p>
            <input class="input submit-input" type="submit" value="更新"/>
        </div>
    </form>
    
    <div class="justify-content">
        <a class="btn btn-middle" href="/posts/myindex">一覧に戻る</a>
    </div>
@endsection