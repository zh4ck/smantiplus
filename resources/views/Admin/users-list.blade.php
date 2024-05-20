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
                        aria-selected="true"><i class="fa-solid fa-user-group"></i>
                        Siswa
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-writers" aria-controls="navs-pills-top-writers"
                        aria-selected="false"><i class="fa-solid fa-user-pen"></i>
                        Siswa-Penulis
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
                <a href="/users-grid" class="btn rounded-pill btn-icon btn-outline-secondary me-2">
                    <span class="tf-icons fa-solid fa-grip"></span>
                </a>
                <a href="#" class="btn rounded-pill btn-icon btn-secondary">
                    <span class="tf-icons fa-solid fa-list"></span>
                </a>
            </div>
        </div>

        <div class="tab-content p-0">
            <div class="tab-pane fade show active" id="navs-pills-top-students" role="tabpanel">
                <div class="card">
                    <h5 class="card-header">Daftar Akun Siswa</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>No.Telp</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $nomor = 1 + ($students->currentPage() - 1) * $students->perPage();
                                @endphp
                                @foreach ($students as $item)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>
                                            @if ($item->profile != '')
                                                <img class="rounded" src="{{ asset('storage/profile/' . $item->profile) }}"
                                                    alt="" width="50px" height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @else
                                                <img class="rounded"
                                                    src="{{ asset('assets/assets/img/profile-default.png') }}"
                                                    alt="" width="50px" height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @endif
                                        </td>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                            class="fa-solid fa-pen-to-square me-1"></i>
                                                        Detail
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#nonActiveUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-user-slash me-1"></i>
                                                        Nonaktifkan
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-trash me-1"></i>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3 mt-3">
                        {!! $students->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

            @foreach ($students as $item)
                <!-- Modal Nonatifkan Akun -->
                <div class="modal fade" id="nonActiveUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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
                <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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

            <div class="tab-pane fade" id="navs-pills-top-writers" role="tabpanel">
                <div class="card">
                    <h5 class="card-header">Daftar Akun Siswa-Penulis</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>No.Telp</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $nomor = 1 + ($writers->currentPage() - 1) * $writers->perPage();
                                @endphp
                                @foreach ($writers as $item)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>
                                            @if ($item->profile != '')
                                                <img class="rounded"
                                                    src="{{ asset('storage/profile/' . $item->profile) }}" alt=""
                                                    width="50px"height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @else
                                                <img class="rounded"
                                                    src="{{ asset('assets/assets/img/profile-default.png') }}"
                                                    alt="" width="50px" height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @endif
                                        </td>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                            class="fa-solid fa-pen-to-square me-1"></i>
                                                        Detail
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#nonActiveUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-user-slash me-1"></i>
                                                        Nonaktifkan
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-trash me-1"></i>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3 mt-3">
                        {!! $writers->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

            @foreach ($writers as $item)
                <!-- Modal Nonatifkan Akun -->
                <div class="modal fade" id="nonActiveUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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
                <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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

            <div class="tab-pane fade" id="navs-pills-top-nonActive" role="tabpanel">
                <div class="card">
                    <h5 class="card-header">Daftar Akun Non Aktif</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>No.Telp</th>
                                    <th>Peran</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $nomor = 1 + ($nonActive->currentPage() - 1) * $nonActive->perPage();
                                @endphp
                                @foreach ($nonActive as $item)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>
                                            @if ($item->profile != '')
                                                <img class="rounded"
                                                    src="{{ asset('storage/profile/' . $item->profile) }}" alt=""
                                                    width="50px" height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @else
                                                <img class="rounded"
                                                    src="{{ asset('assets/assets/img/profile-default.png') }}"
                                                    alt="" width="50px" height="50px"
                                                    style="object-fit: cover; overflow: hidden;">
                                            @endif
                                        </td>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            @if ($item->role_id == 3)
                                                <span class="badge bg-info">Penulis</span>
                                            @elseif ($item->role_id == 4)
                                                <span class="badge bg-primary">Siswa</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/userDetail/{{ $item->slug }}" class="dropdown-item"><i
                                                            class="fa-solid fa-pen-to-square me-1"></i>
                                                        Detail
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#activeUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-user-check me-1"></i>
                                                        Aktifkan
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUser{{ $item->slug }}"><i
                                                            class="fa-solid fa-trash me-1"></i>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3 mt-3">
                        {!! $nonActive->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

            @foreach ($nonActive as $item)
                <!-- Modal Aktifkan Akun -->
                <div class="modal fade" id="activeUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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
                <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
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
@endsection
