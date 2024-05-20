@extends('layouts.mainLayout')

@section('title', 'Detail User')

@section('content')
    <link href="{{ asset('assets/assets/css/select-multiple.css') }}" rel="stylesheet" />
    <h3 class="card-header">Detail @if ($user->role_id == 1)
            Admin
        @elseif ($user->role_id == 2)
            Petugas
        @else
            Peminjam
        @endif
    </h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible mx-3" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/editUser-process/{{ $user->slug }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 ">
                                <div class="d-flex justify-content-center align-items-center">
                                    @if ($user->profile != '')
                                        <img src="{{ asset('storage/profile/' . $user->profile) }}" class="rounded"
                                            height="120px" width="120px" alt="">
                                    @else
                                        <img src="{{ asset('assets/assets/img/profile-default.png') }}" class="rounded"
                                            height="120px" width="120px" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="col mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ $user->username }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="col mb-2">
                                    <label for="image" class="form-label">Profile</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                                <div class="col mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="col mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" rows="4" name="address" placeholder="Masukkan Alamat" required>{{ $user->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="col mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="number" id="phone" name="phone" class="form-control"
                                        value="{{ $user->phone }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="col mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option>{{ $user->status }}</option>
                                        @if ($user->status == 'Aktif')
                                            <option>Nonaktif</option>
                                        @else
                                            <option>Aktif</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="col">
                                    <label for="role_id" class="form-label">Peran</label>
                                    <select name="role_id" id="role_id" class="form-select">
                                        @if ($user->role_id == 1)
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                            <option value="3">Peminjam</option>
                                        @elseif ($user->role_id == 2)
                                            <option value="2">Petugas</option>
                                            <option value="1">Admin</option>
                                            <option value="3">Peminjam</option>
                                        @else
                                            <option value="3">Peminjam</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="/users" class="btn btn-outline-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/assets/js/select-multiple.js') }}"></script>

    <script>
        new MultiSelectTag('select-category', {
            rounded: true,
            placeholder: 'Cari Kategori...',
        });
    </script>
@endsection
