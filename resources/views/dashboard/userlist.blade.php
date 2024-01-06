@extends('dashboard.layouts.main')
@section('container')
    <!--Content-->
    <main>
      <div class="container-fluid px-4">
        <h1 class="mt-4">RestoKu</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">User List</li>
          </ol>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h3 class="h5 mb-4 text-center">Data User</h3>
            @if(session('dltSuccess'))
              <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                {{ session('dltSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if(session('dtrSuccess'))
              <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                {{ session('dtrSuccess') }}
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->nama }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->nomor_hp }}</td>
                          <td>{{ $user->role }}</td>
                          <td>
                            <a href="/userlist/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Menghapus Data Ini?')">Delete</button>
                            </form>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-lg-2 col-md-2 ">
              <a href="postuser" class="btn btn-primary py-2 px-4">Input Data</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--Content-->
@endsection
