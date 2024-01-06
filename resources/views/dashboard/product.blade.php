@extends('dashboard.layouts.main')
@section('container')
    <!--Content-->
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">RestoKu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Menu</li>
            </ol>
            <hr>
            <div class="row">
                <div class="col-md-12">
                  <h3 class="h5 mb-4 text-center">Data Menu</h3>
                  @if(session('dltSuccess'))
                    <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                      {{ session('dltSuccess') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
      
                  @if(session('inpSuccess'))
                    <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                      {{ session('inpSuccess') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif

                  @if(session('edtSuccess'))
                    <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                      {{ session('edtSuccess') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
      
                  @if(session('dltError'))
                    <div class="alert alert-danger alert-dismissible fade show fadeInUp" role="alert">
                      {{ session('dltError') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th class="text-center">ID Menu</th>
                            <th class="text-center">Gambar Menu</th>
                            <th class="text-center">Kategori ID</th>    
                            <th>Nama Menu</th>
                            <th>Ringkasan</th>
                            <th>Harga</th>
                            <th>Harga Promo</th>
                            <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td class="text-center">{{ $food->id_menu }}</td>
                                <td>
                                    <img src="{{ asset('img/menu/' . $food->gambar_menu) }}" alt="Gambar Menu" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td  class="text-center">{{ $food->kategori_id }}</td>
                                <td>{{ $food->nama_menu }}</td>
                                <td>{{ $food->ringkasan }}</td>
                                <td>{{ $food->harga }}</td>
                                <td>{{ $food->harga_promo }}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-primary btn-sm mx-2">Edit</a>
                                        <form action="{{ route('foods.destroy', $food->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Ini?')">Delete</button>
                                        </form>
                                    </div>
                                  
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-2 col-md-2 ">
                  <a href="/newproduct" class="btn btn-primary py-2 px-4">Input Data</a>
                </div>
            </div>
        </div>
    </main>
    <!--Content-->
@endsection
