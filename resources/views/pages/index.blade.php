@extends('layouts.main')
@section('container')
<div class="container-fluid p-5">
    <div class='row'>
        @foreach($post as $post)
        <div class="col-sm-4">
            <div class="card mb-3 shadow-lg">
                <div class="card-body">
                <img src="images/{{$post->image}}" style="height: 320px; width:100%;" class="img-fluid" alt="testcase">
                    <h5 class="card-title">{{$post->judul}}</h5>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit( html_entity_decode($post->content), 180, ' ...') !!}</p>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->format('D, M Y, G:i A') }}</small></p>
                    <span class="badge rounded-pill bg-info text-dark">Penulis: {{$post->penulis->firtsname}}</span>
                    <hr>
                    <a href="{{route('pages.show', $post->id)}}" type="button" class="btn btn-danger m-2">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection