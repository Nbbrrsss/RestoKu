@extends('layouts.main')

@section('container')
    <!-- Navbar & Hero Start -->
    @include('partials.navbar')

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
            <p class="text-white">Apapun kebutuhan Anda, kami siap melayani Anda. Berikut menu yang kami tawarkan untuk berbagai keperluan Anda.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Menu Start -->
    <div class="container-xxl-fluid py-3">
        <div class="container">
            <!-- Form Pencarian -->
            <div class="col-md-12 pb-3">
                <form action="{{ route('menu.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <!-- Bagian Kategori -->
            <div class="text-center">
                <h3 class="mt-n1 mb-2">Kategori</h3>
            </div>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                <div class="text-center">
                                    <h6 class="mt-n1 mb-0">{{ $category->nama }}</h6>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Content untuk Masing-masing Kategori -->
                <div class="tab-content">
                    @foreach($categories as $category)
                        <div id="tab-{{ $category->id }}" class="tab-pane fade show p-0 @if($loop->first) active @endif">
                            <div class="row g-4">
                                @foreach($foodsByCategory[$category->id] as $food)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <!-- Ganti URL gambar dan atribut lain sesuai kebutuhan -->
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/'.$food->gambar_menu) }}" alt="{{ $food->nama_menu }}" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $food->nama_menu }}</span>
                                                    <span class="text-primary">Rp. {{ number_format($food->harga_promo,2)}}</span>
                                                </h5>
                                                <div class="d-flex justify-content-between">
                                                    <small class="fst-italic">{{ $food->ringkasan }}</small>
                                                    <div class="col-lg-1">
                                                        <form action="{{ route('cart.add', ['food_id' => $food->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="col-lg-1">
                                                                <button type="submit" class="btn btn-primary py-1 px-2 bi bi-bag"></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection