@extends('layouts.main')
@section('container')
<div class="container-fluid p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login Admin</h2>
            </div>
            @if (session()->has('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
        </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
                    <h3 class="text-center mb-4">Sign In</h3>
                    <form action="" class="login-form" method='POST'>
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control rounded-left mb-2" placeholder="email" value="admin@gmail.com" required>
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" name="password" class="form-control rounded-left mb-2" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection