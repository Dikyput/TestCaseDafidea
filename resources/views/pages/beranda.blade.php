@extends('layouts.main')
@section('container')
<div class="container-fluid p-5">
    <div class='row'>
        @foreach($post as $post)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-header">  
                </div>
                <img src="https://wartapoin.com/wp-content/uploads/2023/03/pp-kosong.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->judul}}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit( $post->content, 180, ' ...') }}</p>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->format('D, M Y, G:i A') }}</small></p>
                    <span class="badge rounded-pill bg-info text-dark">Penulis: {{$post->penulis->firtsname}}</span>
                    <hr>
                    <a href="/artikel/{{$post->id}}" type="button" class="btn btn-danger m-2">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection