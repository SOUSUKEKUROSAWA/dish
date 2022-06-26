@extends('layouts.app')

@section('content')
    <!--<script type="module" src="https://unpkg.com/x-frame-bypass"></script>-->
    <!--<div id='openEditer' data-posts=''></div>-->
    <div class="own_posts">
        @foreach($own_posts as $post)
            <div class="box-shadow box-shadow-searchpost preview-frame">
                <p>URL：<a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a></p>
                <a class="btn btn-secondary" href="/posts/url/{{ $post->id }}/editer">編集する</a>
                <p><br></p>
                <div class="flex-start">
                    <p>画像：</p>
                    <a class="btn btn-secondary" href="/posts/img/{{ $post->id }}/editer">編集する</a>
                </div>
                <img class='myindex-image' src={{$post->img_path }}>
                <p><br></p>
                <div class="flex-start">
                    <p>コメント：<p/>
                    <a class="btn btn-secondary" href="/posts/comment/{{ $post->id }}/editer">編集する</a>
                </div>
                <p>{{ $post->comment }}<br></p>
                <small>作成日時：{{ $post->created_at }}<br></small>
                <small>更新日時：{{ $post->updated_at }}<br></small>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="button" onclick="buttonClick( {{$post->id}} )">削除する</button>
                </form>
            </div>
        @endforeach
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>
    <script>
        function buttonClick(PostId){
            if (window.confirm('削除すると復元できません．\n本当に削除しても大丈夫？')){
                document.getElementById(`form_${PostId}`).submit();
            }
        }
    </script>
@endsection