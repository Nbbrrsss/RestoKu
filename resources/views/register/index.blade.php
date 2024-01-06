@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Silahkan Registrasi</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Registrasi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Login Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Halaman Registrasi</h5>
                <h2 class="mb-5">Silahkan Lengkapi Data Untuk Registrasi Member</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-8">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="/register" method="post">
                        @csrf
                            <div class="row g-3">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Lengkap Kamu" required value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
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
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-floating">
                                        <input type="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" placeholder="Masukan nomor_hp Kamu" required pattern="\d+" value="{{ old('nomor_hp') }}">
                                        <label for="nomor_hp">Nomor Hp</label>
                                        @error('nomor_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password Kamu" required>
                                        <label for="password">Password</label>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Registrasi</button>
                                </div>
                                <div class="mt-3">
                                    <p class="mb-1" id="t-card">Sudah Punya Member? <a href="/login" class="lppas">Login Sekarang</a></p>
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
