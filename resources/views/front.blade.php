@extends('layouts.app')

@section('content')
    <div class="centreren">
        <h1>気分deご飯とは？</h1>
        <img id="top-image" src="./img/c5caaa1a.png">
        <h2>今日のご飯に迷っていますか？</h2>
        <div class="side-by-side">
            <div class="box-shadow">
                <p>
                    「気分deご飯」は，あなたの今の気分を選ぶことで，<br>それに合った料理と，<br>そのレシピが見れるサイトを<br>教えてくれるサービスです．
                </p>
            </div>
            <div class="box-shadow">
                <p>
                    このサービスは，「料理を紹介してくれる人」がいてはじめて成り立つサービスです．<br>
                    今日のご飯に迷っている人のために，ぜひあなたのおすすめの料理を紹介してください．
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
        <div class="side-by-side bubble">
            <div class="item shake1">
                    <a class='front-link searching' href="/searchtag">気分de探す</a>
            </div>
            <div class="item shake2">
                    <a class='front-link posting' href="/selecttag">おすすめを<br>紹介する</a>
            </div>
        </div>
    </div>
@endsection