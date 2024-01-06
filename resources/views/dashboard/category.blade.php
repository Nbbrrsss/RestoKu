@extends('dashboard.layouts.main')
@section('container')
    <!--Content-->
    <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">RestoKu</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Category List</li>
            </ol>
        </div>
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
                      <th>ID</th>
                      <th>Nama Kategori</th>
                      <th>Singkatan</th>    
                      <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                      <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->nama }}</td>
                          <td>{{ $category->slug }}</td>

                          <td>
                              <div class="d-flex">
                                  <a href="#" class="btn btn-primary btn-sm mx-2">Edit</a>
                                  <form action="#" method="POST" class="d-inline">
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
    </main>
    <!--Content-->
@endsection
