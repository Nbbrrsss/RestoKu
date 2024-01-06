@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Silahkan Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Login Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Halaman Login Admin</h5>
                <h2 class="mb-5">Silahkan Login Untuk Masuk Ke Akun Admin</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-8">
                    @if(session()->has('Success'))
                    <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                        {{ session('Success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show fadeInUp" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="/loginadmin" method="post">
                        @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email Kamu" required value="{{ old('email') }}">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password Kamu" required>
                                        <label for="name">Password</label>
                                        <p class="lp text-sm-end fs-6 "><a class="lppas" href="/id/forgot-password.html">Lupa Password?</a></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                                <div class="mt-3">
                                    <p class="mb-1" id="t-card">Belum Punya Member? <a href="/register" class="lppas">Daftar Sekarang</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
    
@endsection
