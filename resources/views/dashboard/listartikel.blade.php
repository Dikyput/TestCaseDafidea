@extends('dashboard.main')
@section('containerdashboard')
<div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card p-3 m-3 bg-primary shadow-lg">
                    <h3 class="text-white text-center">
                        DATA ARTIKEL
                    </h3>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger mt-3 btn-sm m-3" data-bs-toggle="modal" data-bs-target="#ModalNewArtikel">NEW ARTIKEL</button>
                    <div class="table-responsive p-4 shadow-lg">
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Judul</th>
                                    <th style="text-align: center">Content</th>
                                    <th style="text-align: center">Image</th>
                                    <th style="text-align: center">Comment</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach($post as $post)
                                <tr>
                                    <td style="text-align: center">{{ $nomer++ }}</td>
                                    <td style="text-align: center">{{$post->judul}}</td>
                                    <td style="text-align: center">{{$post->content}}</td>
                                    <td style="text-align: center" name='image' value='{{$post->image}}'>
                                    <img src="images/{{$post->image}}" width="100"></img>
                                    </td>
                                    <td style="text-align: center">{{ $post->comment->count() }}</td>
                                    <!-- Action -->
                                    <td style="text-align: center">
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL NEW ARTIKEL -->
<div class="modal fade" id="ModalNewArtikel" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal New Artikel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/postartikel') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="number" class="form-control" name="author" id="author" value="1">
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Artikel">
        </div>
        <div class="mb-3">
            <label for="textartikel" class="form-label">Text Artikel</label>
            <textarea class="form-control" name="content" id="textartikel" rows="12"></textarea>
        </div>
        <div class="mb-3">
            <label for="fileimage" class="form-label">Upload Image</label>
            <input type="file" class="form-control" name="fileimage" id="fileimage">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload Artikel</button>
      </div>
      <form>
    </div>
  </div>
</div>

<script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      });
      $(document).ready( function () {
          $('#myTable5').DataTable({
            pageLength: 5,
            lengthMenu: false,
          });
      });
      $(document).ready( function () {
          $('#myTable2').DataTable();
      });
      </script>
@endsection