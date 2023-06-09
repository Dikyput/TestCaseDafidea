@extends('dashboard.main')
@section('containerdashboard')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-6 col-sm-3 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">TOTAL ARTIKEL</p>
                <h4 class="mb-0">{{$countA}}</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Comment</p>
                <h4 class="mb-0">{{$countC}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
          </div>
        </div>
      <div class="row mt-4">
        
      </div>
    </div>

@endsection