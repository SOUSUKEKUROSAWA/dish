@extends('layouts.app')

@section('content')
    <h1>気分deご飯とは？</h1>
    <img id="top-image" src="{{asset("/img/c5caaa1a.png")}}">
    <h2>今日のご飯に迷っているあなたに</h2>
    <div class="side-by-side">
        <div class="box-shadow box-shadow-front">
            <h3 class="explain">
                直感的なレシピ検索
            </h3>
            <p>
                「気分deご飯」は，<br>あなたの今の気分を選ぶことで，<br><br>それに合った料理と，<br>そのレシピ<br><br>が見れるサイトを教えてくれるサービスです．
            </p>
        </div>
        <div class="box-shadow box-shadow-front">
            <h3 class="explain">
                自由なレシピ紹介
            </h3>
            <p>
                このサービスは，「料理を紹介してくれる人」がいてはじめて成り立つサービスです．<br><br>今日のご飯に迷っている人のために，ぜひあなたのおすすめの料理を紹介してください．
            </p>
        </div>
    </div>
    <div class="side-by-side">
        <div class="arrows">
        	<div class="arrow arrowfirst"></div>
        	<div class="arrow arrowsecond"></div>
        </div>
        <div class="arrows">
        	<div class="arrow arrowfirst"></div>
        	<div class="arrow arrowsecond"></div>
        </div>
    </div>
    <div class="side-by-side">
        <div class="bubble-field">
            <div class="item shake1">
                <a class="btn bubble-name" href="/tags/searchtag">気分de探す</a>
            </div>
        </div>
        <div class="bubble-field">
            <div class="item shake2">
                <a class="btn bubble-name" href="/tags/selecttag">おすすめを<br>紹介する</a>
            </div>
        </div>
    </div>
@endsection