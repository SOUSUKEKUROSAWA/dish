@extends('layouts.app')

@section('content')
    <h1 class="explain">{{Auth::user()->name}}さんの投稿一覧</h1>
    
    <!--<script type="module" src="https://unpkg.com/x-frame-bypass"></script>-->
    
    <div class="posts">
        @foreach($own_posts as $post)
            <div class="box-shadow box-shadow-searchpost preview-frame">
                <a class="btn btn-middle" href="{{ $post->url }}" target="_blank">サイトへGO</a>
                <a class="btn btn-mini" href="/posts/url/{{ $post->id }}/editer">URLを登録し直す</a>
                <p><br></p>
                
                <div class="flex-start">
                    <p>画像：</p>
                    <a class="btn btn-mini" href="/posts/img/{{ $post->id }}/editer">編集する</a>
                </div>
                <div class="justify-content">
                    <img class='preview-image' src={{$post->img_path }}>
                </div>
                
                <div class="flex-start">
                    <p>コメント：<p/>
                    <a class="btn btn-mini" href="/posts/comment/{{ $post->id }}/editer">編集する</a>
                </div>
                <p>{{ $post->comment }}<br></p>
                
                <small>作成日時：{{ $post->created_at }}<br></small>
                <small>更新日時：{{ $post->updated_at }}<br></small>
                
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