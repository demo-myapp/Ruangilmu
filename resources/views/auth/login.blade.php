{{-- @extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                      	<!-- ACTIONNYA MENGARAH PADA URL /LOGIN -->
                      	<!-- UNTUK MENCARI TAU TUJUAN URI DARI ROUTE NAME DIBAWAH, PADA COMMAND LINE, KETIKKAN PHP ARTISAN ROUTE:LIST DAN CARI URI YANG MENGGUNAKAN METHOD POST -->
                      	<!-- KARENA URI /LOGIN DENGAN METHOD GET DIGUNAKAN UNTUK ME-LOAD VIEW HALAMAN LOGIN -->
                      	<!-- PENGGUNAAN ROUTE() APABILA ROUTING TERSEBUT MEMILIKI NAMA, ADAPUN NAMENYA ADA PADA COLOM NAME ROUTE:LIST -->
                      	<!-- JIKA ROUTINGNYA TIDAK MEMILIKI NAMA, MAKA GUNAKAN HELPER URL() DAN DIDALAMNYA ADALAH URINYA. CONTOH URL('/LOGIN') -->
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                              
                              	<!-- $errors->has('email') AKAN MENGECEK JIKA ADA ERROR DARI HASIL VALIDASI LARAVEL, SEMUA KEGAGALAN VALIDASI LARAVEL AKAN DISIMPAN KEDALAM VARIABLE $errors -->
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="text" 
                                    name="email"
                                    placeholder="Email Address" 
                                    value="{{ old('email') }}" 
                                    autofocus 
                                    required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="password" 
                                    name="password"
                                    placeholder="Password" 
                                    required>
                            </div>
                            <div class="row">
                                @if (session('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif

                                <div class="col-6">
                                    <button class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}"
                     name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="password" placeholder="Password" required>
                  </div>
                @if (session('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
                    <button class="btn btn-primary btn-user btn-block mt-5">Login</button>
                    <div class="text-center mt-3">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                </form>
              </div>
        </div>
      </div>

    </div>

  </div>
  @endsection