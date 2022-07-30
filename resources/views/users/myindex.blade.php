@extends('layouts.app')

@section('content')
    <h1 class="explain">{{Auth::user()->name}}さんの投稿一覧</h1>
    
    <!--<script type="module" src="https://unpkg.com/x-frame-bypass"></script>-->
    
    <div class="posts">
        @foreach($own_posts as $post)
            <div class="box-shadow box-shadow-searchpost preview-frame">
                <div class="space-between">
                    <a class="btn btn-middle" href="{{ $post->url }}" target="_blank">サイトへGO</a>
                    <a class="btn btn-mini" href="/posts/{{ $post->id }}/editurl">URLを登録し直す</a>
                </div>
                <p><br></p>
                
                <div class="space-between">
                    <p>画像：</p>
                    <a class="btn btn-mini" href="/posts/{{ $post->id }}/editimg">編集する</a>
                </div>
                <div class="justify-content">
                    <img class='preview-image' src="https://soubucket1.s3.ap-northeast-1.amazonaws.com/{{ $post->img_path }}"> <!-- img_pathにはS3内の画像URLと合致するパスが登録されているので，「https://~」の部分を追加してS3に接続する必要がある -->
                </div>
                
                <div class="space-between">
                    <p>コメント：</p>
                    <a class="btn btn-mini" href="/posts/{{ $post->id }}/editcomment">編集する</a>
                </div>
                <div class="justify-content">
                    <p>{{ $post->comment }}<br><br></p>
                </div>
                
                <small>作成日時：{{ $post->created_at }}<br></small>
                <small>更新日時：{{ $post->updated_at }}<br><br></small>
                
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline"> <!-- JavaScriptで識別できるようにidをつける -->
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="button" onclick="buttonClick( {{$post->id}} )">削除する</button>
                </form>
            </div>
        @endforeach
    </div>
    
    <div class='paginate'>
        {{ $own_posts->links() }}
    </div>
    
    <script>
        function buttonClick(PostId){
            if (window.confirm('削除すると復元できません．\n本当に削除しても大丈夫？')){
                document.getElementById(`form_${PostId}`).submit();
            }
        }
    </script>
@endsection