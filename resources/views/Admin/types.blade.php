@extends('layouts.mainLayout')

@section('title', 'Jenis')

@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">List Jenis</h5>
        <div class="my-3 ms-3 d-flex">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeModal">
                Tambah Jenis
            </button>
        </div>
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
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $nomor = 1 + ($types->currentPage() - 1) * $types->perPage();
                    @endphp
                    @foreach ($types as $item)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#updateType{{ $item->slug }}"><i
                                                class="fa-solid fa-pen-to-square me-1"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteType{{ $item->slug }}"><i
                                                class="fa-solid fa-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal edit Type -->
                        <div class="modal fade" id="updateType{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateTypeModalLabel1">Edit Data Jenis</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/type-edit/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="name" class="form-label">Nama Jenis</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ $item->name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Perbarui</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete Type -->
                        <div class="modal fade" id="deleteType{{ $item->slug }}" tabindex="-1" data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteTypeModalLabel1">Hapus Data Jenis</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/type-delete/{{ $item->slug }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h5>Apakah kamu ingin menghapus Jenis {{ $item->name }} ?</h5>
                                            </div>
                                        </div>
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
                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {!! $types->appends(Request::except('page'))->render() !!}
        </div>
    </div>
    <!--/ Hoverable Table rows -->

    <!-- Modal add Type -->
    <div class="modal fade" id="addTypeModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTypeModalLabel1">Tambah Jenis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama Jenis</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Masukan Nama Jenis" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
