@extends('layouts.mainLayout')

@section('title', 'Detail Akun')

@section('content')
    <h3>
        Detail @if ($admin && $admin->role_id == 1)
            Admin
        @elseif ($admin && $admin->role_id == 2)
            Pengurus OSIS
        @elseif ($student && $student->role_id == 3)
            Siswa Penulis
        @elseif ($student && $student->role_id == 4)
            Siswa
        @endif
    </h3>
    @if (Session::has('messageSuccess'))
        <div class="alert alert-success alert-dismissible mx-3" role="alert">
            {{ Session::get('messageSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="row">
                        <h5 class="card-header">Profile @if ($admin && $admin->role_id == 1)
                                Admin
                            @elseif ($admin && $admin->role_id == 2)
                                Pengurus OSIS
                            @elseif ($student && $student->role_id == 3)
                                Siswa Penulis
                            @elseif ($student && $student->role_id == 4)
                                Siswa
                            @endif
                        </h5>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center">
                                @if ($student && $student->profile != '')
                                    <img src="{{ asset('storage/profile/' . $student->profile) }}" class="rounded"
                                        height="120px" width="120px" alt="">
                                @elseif ($admin && $admin->profile != '')
                                    <img src="{{ asset('storage/profile/' . $admin->profile) }}" class="rounded"
                                        height="120px" width="120px" alt="">
                                @else
                                    <img src="{{ asset('assets/assets/img/profile-default.png') }}" class="rounded"
                                        height="120px" width="120px" alt="">
                                @endif
                            </div>
                            <div class="col my-3 d-flex justify-content-center">
                                @if ($admin)
                                    @if ($admin->role_id == 1)
                                        <div class="badge bg-primary me-2">Admin</div>
                                    @elseif ($admin->role_id == 2)
                                        <div class="badge bg-secondary me-2">Pengurus OSIS</div>
                                    @endif
                                    @if ($admin->status == 'Aktif')
                                        <div class="badge bg-success">Aktif</div>
                                    @else
                                        <div class="badge bg-danger">Nonaktif</div>
                                    @endif
                                @endif
                                @if ($student)
                                    @if ($student->role_id == 3)
                                        <div class="badge bg-info me-2">Siswa-Penulis</div>
                                    @elseif ($student->role_id == 4)
                                        <div class="badge bg-warning me-2">Siswa</div>
                                    @endif
                                    @if ($student->status == 'Aktif')
                                        <div class="badge bg-success">Aktif</div>
                                    @else
                                        <div class="badge bg-danger">Nonaktif</div>
                                    @endif
                                @endif
                            </div>
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="@if ($student) {{ $student->name }} @else {{ $admin->name }} @endif"
                                    readonly>
                            </div>
                            <div class="col mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    value="@if ($student) {{ $student->username }} @else {{ $admin->username }} @endif"
                                    readonly>
                            </div>
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="@if ($student) {{ $student->email }} @else {{ $admin->email }} @endif"
                                    readonly>
                            </div>
                            @if ($student)
                                <div class="col mb-3">
                                    <label for="class" class="form-label">Kelas</label>
                                    <input type="text" id="class" name="class" class="form-control"
                                        value="{{ $student->class }}" readonly>
                                </div>
                            @endif
                            <div class="col mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="@if ($student) {{ $student->phone }} @else {{ $admin->phone }} @endif"
                                    readonly>
                            </div>

                            <div class="d-grid">
                                @if ($admin)
                                    @if ($admin && $admin->name != Auth::guard('administrator')->user()->name)
                                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                            data-bs-target="#editRole">
                                            Ubah Peran
                                        </button>
                                        @if ($admin->status == 'Aktif')
                                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                                data-bs-target="#editStatus">
                                                Nonaktifkan
                                            </button>
                                        @elseif ($admin->status == 'Nonaktif')
                                            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                                data-bs-target="#editStatus">
                                                Aktifkan
                                            </button>
                                        @endif
                                    @endif
                                    <a href="/admin-grid" class="btn btn-outline-secondary">Kembali</a>
                                @endif
                                @if ($student)
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target="#editRole">
                                        Ubah Peran
                                    </button>
                                    @if ($student->status == 'Aktif')
                                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                            data-bs-target="#editStatus">
                                            Nonaktifkan
                                        </button>
                                    @elseif ($student->status == 'Nonaktif')
                                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                            data-bs-target="#editStatus">
                                            Aktifkan
                                        </button>
                                    @endif
                                    <a href="/users-grid" class="btn btn-outline-secondary">Kembali</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Status -->
    <div class="modal fade" id="editStatus" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel1">Apakah Anda ingin
                        @if ($student && $student->status == 'Aktif')
                            nonaktifkan
                        @elseif ($admin && $admin->status == 'Aktif')
                            nonaktifkan
                        @else
                            aktifkan
                        @endif
                        akun ini?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form
                    action="@if ($student) /user-editStatus/{{ $student->slug }} @else /admin-editStatus/{{ $admin->slug }} @endif"
                    method="post">
                    @csrf
                    @method('put')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Role -->
    <div class="modal fade" id="editRole" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form
                    action="@if ($admin) /editRole-admin/{{ $admin->slug }} @elseif ($student) /editRole-user/{{ $student->slug }} @endif"
                    method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <h5 class="modal-title" id="editRoleModalLabel1">
                            @if ($admin && $admin->role_id == 1)
                                Ubah Peran Menjadi Pengurus OSIS
                                <input type="hidden" class="form-control" id="role_id" name="role_id"
                                    value="2" />
                            @elseif ($admin && $admin->role_id == 2)
                                Ubah Peran Menjadi Admin
                                <input type="hidden" class="form-control" id="role_id" name="role_id"
                                    value="1" />
                            @endif
                            @if ($student && $student->role_id == 3)
                                Ubah Peran Menjadi Siswa Biasa
                                <input type="hidden" class="form-control" id="role_id" name="role_id"
                                    value="4" />
                            @elseif ($student && $student->role_id == 4)
                                Ubah Peran Menjadi Siswa Penulis
                                <input type="hidden" class="form-control" id="role_id" name="role_id"
                                    value="3" />
                            @endif
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
