@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">
        <h1>Tambah Produk Baru</h1>
        <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="id_menu" class="form-label">ID Menu:</label>
                <input type="text" name="id_menu" class="form-control">
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori ID:</label>
                <select name="kategori_id" class="form-select">
                    <option value="1">Hidangan Pembuka</option>
                    <option value="2">Ramen</option>
                    <option value="3">Rice Set</option>
                    <option value="4">Sushi Roll</option>
                    <option value="5">Minuman</option>
                    <option value="6">Makanan Penutup</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu:</label>
                <input type="text" name="nama_menu" class="form-control">
            </div>

            <div class="mb-3">
                <label for="ringkasan" class="form-label">Ringkasan:</label>
                <input type="text" name="ringkasan" class="form-control">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" name="harga" class="form-control">
            </div>

            <div class="mb-3">
                <label for="harga_promo" class="form-label">Harga Promo:</label>
                <input type="text" name="harga_promo" class="form-control">
            </div>

            <div class="mb-3">
                <label for="gambar_menu" class="form-label">Gambar Menu:</label>
                <input type="file" name="gambar_menu" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
