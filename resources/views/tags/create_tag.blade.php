<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>気分deご飯</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>タグの新規作成</h1>
        <form action="/tags" method="POST">
            @csrf
            <div class="title">
                <h2>タグ名</h2>
                <input type="text" name="tag_name" placeholder="サイトに訪れた人がどんな気分か想像してみよう　ex.) 「肉食べたい」「安く済ませたい」「15分以内に作りたい」・・・" value="{{ old('tag_name') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('tag_name') }}</p>
            </div>
            <input type="submit" value="作成"/>
        </form>
        <div class="back">
            <a href="/selecttag">既存のタグから選ぶ</a>
        </div>
    </body>
</html>