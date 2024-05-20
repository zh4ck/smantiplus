@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-danger">
                                <i class="fa-fw fa-solid fa-info fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/info">Lihat Informasi</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Informasi</span>
                    <h3 class="card-title mb-2">{{ $infoCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-warning">
                                <i class="fa-fw fa-regular fa-hand-point-up fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/requestRoleList">Lihat Request Penulis</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Request Penulis</span>
                    <h3 class="card-title mb-2">{{ $requestRoleCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fa-fw fa-solid fa-table-cells-large fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/type">Lihat Jenis</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Jenis</span>
                    <h3 class="card-title mb-2">{{ $typeCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-dark">
                                <i class="fa-fw fa-solid fa-hashtag fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/category">Lihat Tag</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Tag</span>
                    <h3 class="card-title mb-2">{{ $categoryCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-info">
                                <i class="fa-fw fa-solid fa-user-group fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/users-grid">Lihat Akun Siswa</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Akun Siswa</span>
                    <h3 class="card-title mb-2">{{ $studentCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-success">
                                <i class="fa-fw fa-solid fa-user-pen fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/users-grid">Lihat Penulis</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Penulis</span>
                    <h3 class="card-title mb-2">{{ $writerCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="fa-fw fa-solid fa-user-gear fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/admin-grid">Lihat Pengurus</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Pengurus</span>
                    <h3 class="card-title mb-2">{{ $adminCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fa-fw fa-solid fa-box-archive fa-lg"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="/admin-grid">Lihat Informasi Diarsipkan</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Info Diarsipkan</span>
                    <h3 class="card-title mb-2">{{ $infoArchivedCount }}</h3>
                </div>
            </div>
        </div>
    </div>


@endsection
