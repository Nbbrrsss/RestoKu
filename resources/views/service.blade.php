@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <!-- Service Start -->
    @include('partials.layanan')
    <!-- Service End -->
    
@endsection
