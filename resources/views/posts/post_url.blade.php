<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>気分deご飯</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>{{ $dish->dish_name }}</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>URL</h2>
                <input type="text" name="post[url]" value="{{ old('post.url') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.url') }}</p>
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="back">
            <a href="/tags/{{ $dish->tag_id }}">料理を選び直す</a>
        </div>
    </body>
</html>