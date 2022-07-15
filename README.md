<p align="right"><a href="https://twitter.com/so_webeng" target="_blank"><img src="https://img.shields.io/twitter/url?label=%E9%96%8B%E7%99%BA%E8%80%85%E3%81%AETweet%E3%82%92%E8%A6%8B%E3%82%8B&style=social&url=https%3A%2F%2Ftwitter.com%2Fso_webeng" alt="Developer's Twitter account"></a></p>


<p align="center"><b>シロクマにタッチすると...</b></p>

<p align="center"><a href="https://stark-journey-71646.herokuapp.com" target="_blank"><img src="https://stark-journey-71646.herokuapp.com/img/c5caaa1a.png" width="400"></a></p>
<h1 align="center">気分deご飯</h1>

##  制作背景
このアプリは一人暮らしの友人との会話の中で，その構想が生まれました．<br><br>
「料理をすることは楽しい．ただ，レシピを毎日考えるのは時にはめんどう」<br><br>
この意見を受けて，「"めんどう"を"楽しい"に変える」ことを目的に，このアプリを制作しました．<br>
ユーザーが「レシピ選びの時間をショートカットする」のではなく，<b>「レシピ選びを楽しむ」</b>ことを願っています．

##  概要
「今日のご飯に迷っているあなたに」<br>
気分deご飯は以下に示すポイントに根差して設計されています．
- 直感的なレシピ検索体験
- 自由度の高い投稿機能
- 温かみのあるUI

「時には面倒な今日のご飯選びを，ユーザーの自由な投稿により楽しいものにする」をコンセプトとしています．<br><br>
<a href="https://stark-journey-71646.herokuapp.com" target="_blank">アプリへGO</a>

##  開発環境
<b>使用言語：</b><br>
- PHP
- HTML
- CSS(SCSS)
- JavaScript(React)

<b>環境：</b><br>
- Laravel(ver.6)
- AWS(EC2＋Cloud9＋S3)
- MySQL(MariaDB)
- Github

<b>デプロイ：</b><br>
- Heroku

##  データ構成
<b>「テーブル構成・リレーション」と「テーブル包含関係」：</b><br>
<img src="https://user-images.githubusercontent.com/55343913/176453593-0e9621ef-a695-48a4-bf53-60adc7b53ea3.jpg" width="225">　<img src="https://user-images.githubusercontent.com/55343913/176453687-f0668515-1e0d-4d2c-9ec2-d25edff41bc9.jpg" width="225">
<br><b>各テーブル詳細：</b><br>
<img src="https://user-images.githubusercontent.com/55343913/176453649-5a1c39fa-4f5f-4fc8-9c63-7b97da3174cf.jpg" width="500">

##  機能
- CRUD
- ログイン
- 画像アップロード＆表示(AWS S3)
- Googleログイン(Google API)
- レシピのランダム検索
- アプリのシェア(Twitter API)
- 投稿のプレビュー

##  こだわり
<b>バブルのように浮かぶ選択肢：</b><br>
SCSSを用いてランダムに振動数を設定し，ふわふわと浮かぶ選択肢を実現しています<br><br>
<img src="https://media.giphy.com/media/nlMCFryVCtEN8rVEkt/giphy.gif" width="225"><br>
<b>わかりやすい一意な操作性：</b><br>
リレーションやhiddenタイプのinputタグを用いて，1ページに1つのフォームによるわかりやすい投稿機能を実現しています<br><br>
<img src="https://media.giphy.com/media/5DNT159Eptp6yJekAO/giphy.gif" width="225">

##  楽しみ方
<b>レシピを検索したいユーザー：</b><br>
レシピを検索したいユーザーは「気分de探す」バブルから一つずつ直感的に選択していくことで，レシピが掲載されている外部サイトにたどり着きます．<br>
迷って決められない場合や，選択することさえ面倒になった場合でも心配ありません．ランダムに選択するボタンによりユーザーはレシピにたどり着くことができます．<br>
その他，ユーザーにより投稿されるユニークな選択肢を楽しむことができます．<br><br>
<b>おすすめサイトを投稿するユーザー：</b><br>
自身のおすすめサイトを投稿するユーザーは，ログインをする必要がありますが，Googleアカウントによるソーシャルログイン機能が実装されているため楽にログインすることができます．<br>
ログイン後は1ページに1つある入力フォームの流れに従って，自由な発想で投稿することができます．<br>
また，ログインしたユーザーは自分の投稿を閲覧・編集・削除することができます．<br>

##  今後の計画
- 画像のファイルサイズのバリデーション
- データ登録の設計見直し（入力が不完全なデータを公開しないようにする）
- 選択肢のランダム選択へのAIの導入（ユーザーの閲覧履歴などを基にAIで選択肢を決定する）
- ページの読み込み速度の向上
- Google Map APIによる近くの外食できる場所の自動検索
- 選択肢のシャッフル（アニメーション付き)
- 関連投稿の表示
- 投稿評価（いいね）とそれによる投稿並び替え
- 投稿されたサイトのプレビュー（動画も再生される）
- レシピの文字検索

<p align="right"><a href="https://twitter.com/so_webeng" target="_blank"><img src="https://img.shields.io/twitter/url?label=%E9%96%8B%E7%99%BA%E8%80%85%E3%81%AETweet%E3%82%92%E8%A6%8B%E3%82%8B&style=social&url=https%3A%2F%2Ftwitter.com%2Fso_webeng" alt="Developer's Twitter account"></a></p>
