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
                    <a href="{{route('listartikel.create')}}" type="button" class="btn btn-lg btn-success mt-3 m-3">NEW ARTIKEL</a>
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
                                    <td style="text-align: center">{{ \Illuminate\Support\Str::limit( $post->judul, 25, ' ...') }}</td>
                                    <td style="text-align: center">{!! \Illuminate\Support\Str::limit( html_entity_decode($post->content), 75, ' ...') !!}</td>
                                    <td style="text-align: center" name='image' value='{{$post->image}}'>
                                    <img src="images/{{$post->image}}" width="100"></img>
                                    </td>
                                    <td style="text-align: center">{{ $post->comment->count() }}</td>
                                    <!-- Action -->
                                    <td style="text-align: center">
                                        <a href="{{url('artikel/'.$post->id)}}" type="button" class="btn btn-sm btn-primary mt-3 btn-sm">View</a> 
                                        <a href="{{ route('listartikel.edit', $post->id) }}" type="button" class="btn btn-sm btn-info mt-3 btn-sm">Edit</a>
                                        <form action="{{ route('listartikel.destroy', $post->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method("delete")
                                          <button class="btn btn-sm btn-danger mt-3 btn-sm" onclick="return confirm('Yakin Ingin Hapus Artikrl?')">Delete</button>
                                        </form>
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

<script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      });
      </script>
@endsection