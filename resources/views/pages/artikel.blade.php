@extends('layouts.main')
@section('container')
<div class="container-fluid p-5">
    
    <div class='row'>
        @foreach($artikel as $post)
        <div class="col-sm-8">
            <div class="card mb-3">
                <img src="https://wartapoin.com/wp-content/uploads/2023/03/pp-kosong.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title">{{$post->judul}}</h1>
                    <p4 class="card-text" style="font-size: 25px;">{{ $post->content }}</p4>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->format('D, M Y, G:i A') }}</small></p>
                    <span class="badge rounded-pill bg-info text-dark">Penulis: {{$post->penulis->firtsname}}</span>
                    <hr>
                    <a href="/" type="button" class="btn btn-danger m-2">Kembali</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                    <hr>
                    @foreach($comment as $comment)
                    <div class="card">
                        <div class="comment-widgets m-2">
                            <div class="d-flex flex-row comment-row">
                                <div class="comment-text w-100">
                                <p class="card-text"><small class="text-muted">{{$comment->created_at->format('D, M Y, G:i A') }}</small></p>
                                    <p class="m-b-5 m-t-10">{{$comment->comments}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <form action="{{ route('submitkomentar') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                        @csrf
                        <div class="form-group">
                        @foreach($artikel as $post)
                        <input value="{{$post->id}}" name="post_id" id="post_id" hidden>
                        <input value="{{$post->author}}" name="user_id" id="user_id" hidden>
                        @endforeach
                        <span class="badge rounded-pill bg-info text-dark" for="comments">TULIS KOMENTAR</span>
                            <textarea required class="form-control" id="comments" name="comments" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success m-2">Komentar</button>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
    $(document).ready(function(){

    var form = '#add-user-form';

    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $(form).trigger("reset");
                alert(response.success)
            },
            error: function(response) {
            }
        });
    });

});
</script>
@endsection