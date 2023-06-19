@extends('layouts.main')
@section('container')
<div class="container-fluid">
    <div class="card-body">
        <a href="javascript:history.back()" type="button" class="btn btn-danger m-2">Kembali</a>
    </div>
    <div class='row p-2'>
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
                    <div id="read" class="mt-3"></div>
                    <form action="javascript:void(0)" id="add-commment-form">
                        @csrf
                    <hr>
                    <div class="form-group">
                    <span class="badge rounded-pill bg-info text-dark" for="comments">TULIS KOMENTAR</span>
                        <textarea required class="form-control" id="comments" name="comments" rows="2"></textarea>
                    </div>
                    <button type="submit" data-id="{{$post->id}}" data-author="{{$post->author}}" class="btn btn-success m-2">Komentar</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#add-commment-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var button = $(this).find('button[type="submit"]');
            formData.append('post_id', button.data('id'));
            formData.append('author', button.data('author'));

            $.ajax({
                url: '{{ route("pages.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);ai
                }
            });
        });
    });
</script>
@endsection