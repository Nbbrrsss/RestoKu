@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
      <div class="container my-5 py-5">
          <div class="row align-items-center g-5">
              <div class="col-lg-12"> 
                  <div class="row">
                      <div class="col-lg-6 pb-5 text-center text-lg-start">
                          <h1 class="display-3 text-white animated slideInLeft">RestoKu<br>Selamat Datang</h1>
                          <p class="text-white animated slideInLeft mb-4 pb-2">
                            Terima kasih telah memilih RestoKu sebagai destinasi kuliner Anda. Kami berharap dapat menyambut Anda segera dan berbagi pengalaman menyantap bersama kami yang penuh kenangan.
                          </p>
                          <a href="/menu" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Order Sekarang</a>
                      </div>
                      <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                          <img class="img-fluid" src="img/hero.png" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- Navbar & Hero End -->

     <!-- About Start -->
    @include('partials.profil')
    <!-- About End -->

    <!-- Service Start -->
    @include('partials.layanan')
    <!-- Service End -->

    <!-- Menu Start -->
    @include('partials.fav')
    <!-- Menu End -->

    <!-- Reservation Start -->
    @include('partials.Lapor')
    <!-- Reservation Start -->
    
@endsection
