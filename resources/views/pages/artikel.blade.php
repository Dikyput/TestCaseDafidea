@extends('layouts.main')
@section('container')
<div class="container-fluid">
    <div class="card-body">
        <a href="javascript:history.back()" type="button" class="btn btn-danger m-2">Kembali</a>
    </div>
    <div class='row p-2'>
                @if (session('diky'))
                <div class="alert alert-success" role="alert">
                    <strong style="color: white;">Success! {{ session('diky') }}</strong>
                </div>
                @endif
        @foreach($artikel as $post)
        <div class="col-sm-8 ">
            <div class="card mb-3 p-3">
            <div class="card-body shadow-lg">
                    <img src="../images/{{$post->image}}" class="img-fluid mx-auto d-block"></img>
                    <div class="card-body">
                    <h1 class="card-title pb-4">{{$post->judul}}</h1>
                        <p>
                            {!! html_entity_decode($post->content) !!}
                        </p>
                        <p class="card-text"><small class="text-muted">{{$post->created_at->format('D, M Y, G:i A') }}</small></p>
                        <span class="badge rounded-pill bg-info text-dark">Penulis: {{$post->penulis->firtsname}}</span>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body shadow-lg">
                    <h4 class="card-title">Recent Comments</h4>
                    <hr>
                    @foreach($comment as $comment)
                    <div class="card">
                        <div class="comment-widgets m-2">
                            <div class="d-flex flex-row comment-row">
                                <div class="comment-text w-100">
                                <p class="card-text"><small class="text-muted">{{$comment->created_at->format('D, M Y, G:i A') }}</small> <i class="fa-sharp fa-solid fa-user"></i></p>
                                  <p class="m-b-5 m-t-10"> {{$comment->comments}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <form action="{{ route('pages.store') }}" method="POST"id="add-user-form">
                        @csrf
                    <hr>
                    <div class="form-group">
                        <input value="{{$post->id}}" name="post_id" id="post_id" hidden>
                        <input value="{{$post->author}}" name="author" id="post_id" hidden>
                    <span class="badge rounded-pill bg-info text-dark" for="comments">TULIS KOMENTAR</span>
                        <textarea required class="form-control" id="comments" name="comments" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success m-2">Komentar</button>
                </div>
            </div>
            </form>
            @endforeach
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