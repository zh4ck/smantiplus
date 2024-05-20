@extends('layouts.mainLayout')

@section('title', 'Petugas')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible mx-3" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('messageSuccess'))
        <div class="alert alert-success alert-dismissible mx-3" role="alert">
            {{ Session::get('messageSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="nav-align-top mb-4">
        <div class="d-flex">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-osis" aria-controls="navs-pills-top-osis" aria-selected="true"><i
                            class="fa-solid fa-user-group"></i>
                        Pengurus
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-admin" aria-controls="navs-pills-top-admin" aria-selected="false"><i
                            class="fa-solid fa-user-gear"></i>
                        Super Admin
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-nonActive" aria-controls="navs-pills-top-nonActive"
                        aria-selected="false"><i class="fa-solid fa-user-xmark"></i>
                        Non-Aktif
                    </button>
                </li>
            </ul>
            <div class="ms-auto">
                <a href="{{ url('/admin-add') }}" class="btn btn-outline-primary me-2 mb-3">
                    Tambah
                </a>
                <a href="#" class="btn rounded-pill btn-icon btn-secondary me-2 mb-3">
                    <span class="tf-icons fa-solid fa-grip"></span>
                </a>
                <a href="/admin-list" class="btn rounded-pill btn-icon btn-outline-secondary mb-3">
                    <span class="tf-icons fa-solid fa-list"></span>
                </a>
            </div>
        </div>


        <div class="tab-content bg-transparent shadow-none">
            <div class="tab-pane fade show active" id="navs-pills-top-osis" role="tabpanel">
                <div class="row">
                    @foreach ($osis as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="custom-block custom-block-full p-1 mb-3">
                                <div class="ms-auto pt-2 ps-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/adminDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            @if (Auth::guard('administrator')->user() != $item)
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#nonActiveAdmin{{ $item->slug }}"><i
                                                        class="fa-solid fa-user-slash me-1"></i>
                                                    Nonaktifkan
                                                </button>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAdmin{{ $item->slug }}"><i
                                                        class="fa-solid fa-trash me-1"></i>
                                                    Hapus
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item rounded">
                                    <div class="text-center px-3">
                                        @if ($item->profile != '')
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('storage/profile/' . $item->profile) }}" alt=""
                                                width="120px" height="120px" style="object-fit: cover; overflow: hidden;">
                                        @else
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('assets/assets/img/profile-default.png') }}" alt=""
                                                width="120px" height="120px" style="object-fit: cover; overflow: hidden;">
                                        @endif
                                        <h5 class="mb-0">{{ $item->name }}</h5>
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-phone"></i> No.Telepon :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Nonatifkan Akun -->
                        <div class="modal fade" id="nonActiveAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            menonaktifkan
                                            akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin-editStatus/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete Akun -->
                        <div class="modal fade" id="deleteAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            menghapus
                                            Akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="text-danger">Akun ini akan terhapus secara permanen!</span>
                                    </div>
                                    <form action="/deleteAdmin/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-admin" role="tabpanel">
                <div class="row">
                    @foreach ($admin as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="custom-block custom-block-full p-1 mb-3">
                                <div class="ms-auto pt-2 ps-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/adminDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            @if (Auth::guard('administrator')->user() != $item)
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#nonActiveAdmin{{ $item->slug }}"><i
                                                        class="fa-solid fa-user-slash me-1"></i>
                                                    Nonaktifkan
                                                </button>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAdmin{{ $item->slug }}"><i
                                                        class="fa-solid fa-trash me-1"></i>
                                                    Hapus
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item rounded">
                                    <div class="text-center px-3">
                                        @if ($item->profile != '')
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('storage/profile/' . $item->profile) }}" alt=""
                                                width="120px" height="120px"
                                                style="object-fit: cover; overflow: hidden;">
                                        @else
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('assets/assets/img/profile-default.png') }}" alt=""
                                                width="120px" height="120px"
                                                style="object-fit: cover; overflow: hidden;">
                                        @endif
                                        <h5 class="mb-0">{{ $item->name }}</h5>
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-phone"></i> No.Telepon :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Nonatifkan Akun -->
                        <div class="modal fade" id="nonActiveAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            menonaktifkan
                                            akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin-editStatus/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete Akun -->
                        <div class="modal fade" id="deleteAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            menghapus
                                            Akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="text-danger">Akun ini akan terhapus secara permanen!</span>
                                    </div>
                                    <form action="/deleteAdmin/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-nonActive" role="tabpanel">
                <div class="row">
                    @foreach ($nonActive as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="custom-block custom-block-full p-1 mb-3">
                                <div class="ms-auto pt-2 ps-2">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/adminDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#ActiveAdmin{{ $item->slug }}"><i
                                                    class="fa-solid fa-user-check me-1"></i>
                                                Aktifkan
                                            </button>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteAdmin{{ $item->slug }}"><i
                                                    class="fa-solid fa-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-item rounded">
                                    <div class="text-center px-3">
                                        @if ($item->profile != '')
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('storage/profile/' . $item->profile) }}" alt=""
                                                width="120px" height="120px"
                                                style="object-fit: cover; overflow: hidden;">
                                        @else
                                            <img class="rounded-circle mb-4 -mt-5"
                                                src="{{ asset('assets/assets/img/profile-default.png') }}" alt=""
                                                width="120px" height="120px"
                                                style="object-fit: cover; overflow: hidden;">
                                        @endif
                                        <h5 class="mb-0">{{ $item->name }}</h5>
                                        @if ($item->role_id == 1)
                                            <span class="badge bg-info">Super Admin</span>
                                        @elseif ($item->role_id == 2)
                                            <span class="badge bg-primary">Pengurus OSIS</span>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-phone"></i> No.Telepon :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Aktifkan Akun -->
                        <div class="modal fade" id="ActiveAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            mengaktifkan
                                            akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin-editStatus/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success">Aktifkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete Akun -->
                        <div class="modal fade" id="deleteAdmin{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteAdminModalLabel1">Apakah Anda
                                            ingin
                                            menghapus
                                            Akun
                                            ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="text-danger">Akun ini akan terhapus secara permanen!</span>
                                    </div>
                                    <form action="/deleteAdmin/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
