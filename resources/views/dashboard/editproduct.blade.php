@extends('dashboard.layouts.main')
@section('container')
    <div class="container mt-4">
        <h1>Edit Product</h1>
        <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="id_menu" class="form-label">ID Menu:</label>
                <input type="text" class="form-control" id="id_menu" name="id_menu" value="{{ $food->id_menu }}">
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori ID:</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option value="1" {{ $food->kategori_id == 1 ? 'selected' : '' }}>Hidangan Pembuka</option>
                    <option value="2" {{ $food->kategori_id == 2 ? 'selected' : '' }}>Ramen</option>
                    <option value="3" {{ $food->kategori_id == 3 ? 'selected' : '' }}>Rice Set</option>
                    <option value="4" {{ $food->kategori_id == 4 ? 'selected' : '' }}>Sushi Roll</option>
                    <option value="5" {{ $food->kategori_id == 5 ? 'selected' : '' }}>Minuman</option>
                    <option value="6" {{ $food->kategori_id == 6 ? 'selected' : '' }}>Makanan Penutup</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu:</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $food->nama_menu }}">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $food->harga }}">
            </div>

            <div class="mb-3">
                <label for="ringkasan" class="form-label">Ringkasan:</label>
                <input type="text" class="form-control" id="ringkasan" name="ringkasan" value="{{ $food->ringkasan }}">
            </div>

            <div class="mb-3">
                <label for="harga_promo" class="form-label">Harga Promo:</label>
                <input type="text" class="form-control" id="harga_promo" name="harga_promo" value="{{ $food->harga_promo }}">
            </div>

            <div class="mb-3">
                <label for="gambar_menu" class="form-label">Gambar Menu:</label>
                <input type="file" class="form-control" id="gambar_menu" name="gambar_menu">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
