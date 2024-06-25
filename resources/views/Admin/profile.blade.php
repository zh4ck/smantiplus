@extends('layouts.mainLayout')

@section('title', 'Profile')

@section('content')
    @if (Session::has('messageSuccess'))
        <div class="alert alert-success alert-dismissible mx-3" role="alert">
            {{ Session::get('messageSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="row">
                        <h5 class="card-header">Profile Saya</h5>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center">
                                @if (Auth::guard('administrator')->user()->profile != '')
                                    <img src="{{ asset('storage/profile/' . Auth::guard('administrator')->user()->profile) }}"
                                        class="rounded" height="120px" width="120px" alt="">
                                @else
                                    <img src="{{ asset('assets/assets/img/profile-default.png') }}" class="rounded"
                                        height="120px" width="120px" alt="">
                                @endif
                            </div>
                            <div class="col my-3 d-flex justify-content-center">
                                @if (Auth::guard('administrator')->user()->role_id == 1)
                                    <div class="badge bg-primary me-2">Admin</div>
                                @else
                                    <div class="badge bg-secondary me-2">Pengurus OSIS</div>
                                @endif
                            </div>
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ Auth::guard('administrator')->user()->name }}" readonly>
                            </div>
                            <div class="col mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    value="{{ Auth::guard('administrator')->user()->username }}" readonly>
                            </div>
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ Auth::guard('administrator')->user()->email }}" readonly>
                            </div>
                            <div class="col mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ Auth::guard('administrator')->user()->phone }}" readonly>
                            </div>

                            <div class="d-grid">
                                <a href="/edit-profile-admin" class="btn btn-outline-primary mb-2">Edit Profile</a>
                                <a class="btn btn-outline-dark mb-2 me-2" data-bs-toggle="collapse"
                                    href="#collapseChangePassword" role="button" aria-expanded="false"
                                    aria-controls="collapseChangePassword">Ganti Password</a>
                                <a href="/dashboard" class="btn btn-outline-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <form action="/change-password-admin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="collapse my-3" id="collapseChangePassword">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="currentPassword" required>Password Lama</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="currentPassword" class="form-control" name="current_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="newPassword" required>Password Baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="newPassword" class="form-control" name="new_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="repeatPassword" required>Konfirmasi
                                    Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="repeatPassword" class="form-control"
                                        name="repeat_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <button class="btn btn-outline-dark d-grid w-100" type="submit">Simpan Password
                                Baru</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
