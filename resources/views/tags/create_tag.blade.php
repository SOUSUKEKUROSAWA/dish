@extends('layouts.app')

@section('content')
    <h1 class='title'>気分タグの新規作成</h1>
    <form action="/tags" method="POST">
        @csrf
        <h3><br>タグ名を考えてね</h3>
        <div class="justify-content">
            <input class="input url-input" type="text" name="tag[tag_name]" placeholder="他の人がどんな気分か想像してみよう" value="{{ old('tag.tag_name') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('tag.tag_name') }}</p>
            <input class="input submit-input" type="submit" value="作成"/>
        </div>
    </form>
    <div class="side-by-side">
        <a href="/selecttag">既存のタグから選ぶ</a>
    </div>
@endsection