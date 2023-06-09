@extends('dashboard.main')
@section('containerdashboard')
<div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    @csrf
                    <div class="card-header pb-0">
                        <h6>Posting Artikel</h6>
                        <i class="far fa-calendar-alt me-2"></i>
                        <small> @php date("Y-d-m H:i:s"); echo date('d - m - Y'); @endphp</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul</label>
                                    <input class="form-control" id="nopol" name="nopol" type="text" placeholder="Judul Artikel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Syaifudin Ilma" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No HP</label>
                                    <input class="form-control" id="phone" name="phone" type="text" placeholder="086837632" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No Rangka</label>
                                    <input class="form-control" id="norangka" name="norangka" type="text" placeholder="JGADJJHA" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No Mesin</label>
                                    <input class="form-control" id="nomesin" name="nomesin" type="text" placeholder="6769GHJGH" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tahun Rakit</label>
                                    <input class="form-control" id="trakit" name="trakit" type="text" placeholder="2020" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Type</label>
                                    <input class="form-control" id="type" name="type" type="text" placeholder="NC62817" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">KM</label>
                                    <input class="form-control" id="km" name="km" type="text" placeholder="4000" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Warna</label>
                                   <input class="form-control" id="warna" name="warna" type="text" placeholder="Hitam" required>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection