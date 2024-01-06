@extends('dashboard.layouts.main')
@section('container')
    <!--Content-->
    <main>
      <div class="container-fluid px-4">
        <h1 class="mt-4">RestoKu</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Input User</li>
          </ol>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="/userlist" method="post">
                    @csrf
                        <div class="row g-3">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Lengkap Kamu" required value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email Kamu" required value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" placeholder="Masukan nomor_hp Kamu" required pattern="\d+" value="{{ old('nomor_hp') }}">
                                    <label for="nomor_hp">Nomor Hp</label>
                                    @error('nomor_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                                        <option value="member"{{ old('role') === 'member' ? 'selected' : '' }}>Member</option>
                                        <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
                                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    <label for="role">Role</label>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password Kamu" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Input Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </main>
    <!--Content-->
@endsection
