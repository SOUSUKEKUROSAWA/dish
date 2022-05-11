<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>気分deご飯</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>{{ $post->dish->dish_name }}</h1>
        <form action="/posts/comment" method="POST">
            @csrf
            <div class="title">
                <h2>コメント（料理のポイント・自己流アレンジなどあれば）</h2>
                <input type="text" name="post[comment]" value="{{ old('post.comment') }}"/>
                <input type="hidden" name="post[url]" value="{{ $post->url }}"/>
                <input type="hidden" name="post[dish_id]" value="{{ $post->dish_id }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.comment') }}</p>
            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="back">
            <a href="/dishes/{{ $post->dish_id }}">URLを登録し直す</a>
            <a href="/tags/{{ $post->dish->tag_id }}">料理を選び直す</a>
        </div>
    </body>
</html>