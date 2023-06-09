<nav class="navbar navbar-dark bg-dark">    
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand m-3" href="#">Beranda</a>
    </div>
    @if (Auth::check())
    <a href="{{ url('/dashboard') }}" style="text-decoration:none" class="btn-lg shadow-lg rounded-pill btn-primary navbar-btn m-3">DASHBOARD</a>
    @else
      @if(Request::is('login'))
      <a href="{{ url('/') }}" style="text-decoration:none" class="btn-lg shadow-lg rounded-pill btn-danger navbar-btn m-3">BACK</a>
      @else
      <a href="{{ url('/login') }}" style="text-decoration:none" class="btn-lg shadow-lg rounded-pill btn-primary navbar-btn m-3">LOG IN</a>
      @endif
    @endif
  </div>
</nav>
<!-- END NAVBAR -->