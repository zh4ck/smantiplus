@extends('layouts.mainLayout')

@section('title', 'Daftar Akun')

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
                        data-bs-target="#navs-pills-top-students" aria-controls="navs-pills-top-students"
                        aria-selected="true"><i class="fa-solid fa-fw fa-user-group"></i>
                        Siswa
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-writers" aria-controls="navs-pills-top-writers"
                        aria-selected="false"><i class="fa-solid fa-fw fa-user-pen"></i>
                        Siswa-Penulis
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-nonActive" aria-controls="navs-pills-top-nonActive"
                        aria-selected="false"><i class="fa-solid fa-fw fa-user-xmark"></i>
                        Non-Aktif
                    </button>
                </li>
            </ul>
            <div class="ms-auto">
                <a href="#" class="btn rounded-pill btn-icon btn-secondary me-2">
                    <span class="tf-icons fa-solid fa-fw fa-grip"></span>
                </a>
                <a href="/users-list" class="btn rounded-pill btn-icon btn-outline-secondary">
                    <span class="tf-icons fa-solid fa-fw fa-list"></span>
                </a>
            </div>
        </div>


        <div class="tab-content bg-transparent shadow-none">
            <div class="tab-pane fade show active" id="navs-pills-top-students" role="tabpanel">
                <div class="row">
                    @foreach ($students as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="custom-block custom-block-full p-1 mb-3">
                                <div class="ms-auto pt-2 ps-3">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-fw fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-fw fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#nonActiveUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-user-slash me-1"></i>
                                                Nonaktifkan
                                            </button>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-fw fa-trash me-1"></i>
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
                                            <h6><i class="fa-solid fa-fw fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-people-roof"></i> Kelas :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->class }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-phone"></i> No.Telp :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Nonatifkan Akun -->
                        <div class="modal fade" id="nonActiveUser{{ $item->slug }}" tabindex="-1"
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
                                    <form action="/user-editStatus/{{ $item->slug }}" method="post">
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
                        <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel1">Apakah Anda yakin
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
                                    <form action="/deleteUser/{{ $item->slug }}" method="post">
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
            <div class="tab-pane fade" id="navs-pills-top-writers" role="tabpanel">
                <div class="row">
                    @foreach ($writers as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="custom-block custom-block-full p-1 mb-3">
                                <div class="ms-auto pt-2 ps-3">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-fw fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-fw fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#nonActiveUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-user-slash me-1"></i>
                                                Nonaktifkan
                                            </button>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-fw fa-trash me-1"></i>
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
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-people-roof"></i> Kelas :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->class }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-phone"></i> No.Telp :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Nonatifkan Akun -->
                        <div class="modal fade" id="nonActiveUser{{ $item->slug }}" tabindex="-1"
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
                                    <form action="/user-editStatus/{{ $item->slug }}" method="post">
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
                        <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel1">Apakah Anda yakin
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
                                    <form action="/deleteUser/{{ $item->slug }}" method="post">
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
                                            <i class="fa-solid fa-fw fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-fw fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#activeUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-user-check me-1"></i>
                                                Aktifkan
                                            </button>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                    class="fa-solid fa-fw fa-trash me-1"></i>
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
                                    </div>
                                    <hr>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-user"></i> Username :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-envelope"></i> Email :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->email }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-people-roof"></i> Kelas :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->class }}</h6>
                                        </div>
                                    </div>
                                    <div class="px-3">
                                        <div class="d-flex">
                                            <h6><i class="fa-solid fa-fw fa-phone"></i> No.Telp :</h6>
                                            <h6 class="ms-auto fw-light">{{ $item->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Aktifkan Akun -->
                        <div class="modal fade" id="activeUser{{ $item->slug }}" tabindex="-1"
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
                                    <form action="/user-editStatus/{{ $item->slug }}" method="post">
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
                        <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1"
                            data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel1">Apakah Anda yakin
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
                                    <form action="/deleteUser/{{ $item->slug }}" method="post">
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
