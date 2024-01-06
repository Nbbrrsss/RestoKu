@extends('layouts.main')
@section('container')
    <!-- Navbar & Hero Start -->
    @include('cashier.partials.navbar')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <!-- Cart Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($cartItems->isEmpty())
                    <div class="col-lg-12" style="min-height: 350px">
                        <div style="text-align: center; font-size: 20px; margin: 100px 0;">Keranjang Kamu Masih Kosong</div>
                    </div>
                @else
                    <?php $totalPrice = 0; ?>
                    <form action="{{ route('checkoutkasir') }}" method="POST" class="d-grid gap-2">
                        @csrf
                        <div class="mb-3">
                            <label for="nomor_meja" class="form-label">Nomor Meja:</label>
                            <select class="form-select" id="nomor_meja" name="nomor_meja" required>
                                <option value="">Pilih Nomor Meja</option>
                                <option value="1">Meja 1</option>
                                <option value="2">Meja 2</option>
                                <option value="3">Meja 3</option>
                                <option value="4">Meja 4</option>
                                <option value="5">Meja 5</option>
                                <option value="6">Meja 6</option>
                                <option value="7">Meja 7</option>
                                <option value="8">Meja 8</option>
                                <option value="9">Meja 9</option>
                                <option value="10">Meja 10</option>
                                <option value="11">Meja 11</option>
                                <option value="12">Meja 12</option>
                                <option value="13">Meja 13</option>
                                <option value="14">Meja 14</option>
                                <option value="15">Meja 15</option>
                                <option value="16">Meja 16</option>
                                <option value="17">Meja 17</option>
                                <option value="18">Meja 18</option>
                                <option value="19">Meja 19</option>
                                <option value="20">Meja 20</option>
                            </select>
                        </div>
                        <!-- Menampilkan pesan kesuksesan atau kesalahan setelah penghapusan item -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            @foreach($cartItems as $cartItem)
                                <div class="col mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('img/menu/' . $cartItem->food->gambar_menu) }}" class="card-img-top" alt="Gambar Menu">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $cartItem->food->nama_menu }}</h5>
                                            <p class="card-text">{{ $cartItem->food->ringkasan }}</p>
                                            <p class="card-text">Harga: Rp. {{ $cartItem->food->harga }}</p>
                                            <p class="card-text">Jumlah: {{ $cartItem->quantity }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">
                                                <a href="{{ route('hapus_itemkasir', ['id' => $cartItem->id]) }}" class="btn btn-danger">Hapus</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php $totalPrice += $cartItem->food->harga * $cartItem->quantity; ?>
                            @endforeach
                        </div>

                        <div class="text-center mb-4">
                            <h4>Total Harga: Rp. {{ $totalPrice }}</h4>
                        </div>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </form>
                @endif
                
            </div>
        </div>
    </div>
@endsection
