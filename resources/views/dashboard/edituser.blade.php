@extends('dashboard.layouts.main')
@section('container')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">RestoKu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required value="{{ $user->nama }}">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ $user->email }}">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nomor_hp" placeholder="Nomor HP" required pattern="\d+" value="{{ $user->nomor_hp }}">
                                    <label for="nomor_hp">Nomor HP</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="role" required>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="kasir" {{ $user->role === 'kasir' ? 'selected' : '' }}>kasir</option>
                                        <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>Member</option>
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
