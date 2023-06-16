@extends('dashboard.main')
@section('containerdashboard')
<div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Artikel</h6>
                        <i class="far fa-calendar-alt me-2"></i>
                        <small> @php date("Y-d-m H:i:s"); echo date('d - m - Y'); @endphp</small>
                    </div>
                    <div class="card-body">
                    <a href="{{route('listartikel.index')}}" type="button" class="btn btn-danger">Kembali</a>
                    <form action="{{ route('listartikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{$artikel->judul}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="textartikel" class="form-label">Text Artikel</label>
                            <input id="textartikel" value="{{$artikel->content}}" type="hidden" name="content">
                            <trix-editor input="textartikel" required></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="fileimage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="fileimage" id="fileimage" accept="image/*">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection