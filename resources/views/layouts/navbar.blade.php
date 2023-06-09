<nav class="navbar navbar-dark bg-dark">    
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand m-3" href="#">Beranda</a>
    </div>
    @if(Request::is('login'))
    <a href="{{ url('/') }}" class="btn-lg shadow-lg rounded-pill btn-danger navbar-btn m-3">BACK</a>
    @else
    <a href="{{ url('/login') }}" class="btn-lg shadow-lg rounded-pill btn-primary navbar-btn m-3">LOG IN</a>
    @endif
  </div>
</nav>
<!-- END NAVBAR -->