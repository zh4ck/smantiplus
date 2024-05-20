@extends('layouts.mainLayout')

@section('title', 'Tambah Pengurus')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- /Logo -->
            <h4 class="mb-3">Form Tambah Pengurus</h4>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            @if (Session::has('message'))
                <div class="alert alert-danger alert-dismissible mx-3" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="formAddAdmin" class="mb-3" action="{{ url('/admin-add/process') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama"
                        value="{{ old('name') }}" autofocus required />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan Username" value="{{ old('username') }}" autofocus required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email"
                        value="{{ old('email') }}" required />
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" id="phone" name="phone"
                        placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}" autofocus required />
                </div>
                <input type="hidden" class="form-control" id="role_id" name="role_id" value="2" />
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password" required>Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" value="{{ old('password') }}" required />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100 mb-2" type="submit">Tambah</button>
                <a href="/admin-list" class="btn btn-outline-secondary d-grid">Kembali</a>
            </form>
        </div>
    </div>
@endsection
