@extends('layouts.app')

@section('content')
    <h1 class='title'>タグの新規作成</h1>
    <form action="/tags" method="POST">
        @csrf
        <div class="title">
            <h2>タグ名</h2>
            <input type="text" name="tag[tag_name]" placeholder="サイトに訪れた人がどんな気分か想像してみよう　ex.) 「肉食べたい」「安く済ませたい」「15分以内に作りたい」・・・" value="{{ old('tag.tag_name') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('tag.tag_name') }}</p>
        </div>
        <input type="submit" value="作成"/>
    </form>
    <div class="back">
        <a href="/selecttag">既存のタグから選ぶ</a>
    </div>
@endsection