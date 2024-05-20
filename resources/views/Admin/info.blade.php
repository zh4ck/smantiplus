@extends('layouts.mainLayout')

@section('title', 'Informasi')

@section('content')
    <div class="my-3 mx-3 d-flex">
        <a href="/info-add" class="btn btn-primary">
            Tambah Informasi
        </a>
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

    <div class="card">
        <h5 class="card-header">List Informasi</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Waktu Terbit</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $nomor = 1 + ($info->currentPage() - 1) * $info->perPage();
                    @endphp
                    @foreach ($info as $item)
                        @if ($item->status == 'Penting' || $item->status == 'Biasa')
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/imgInfo/' . $item->imgInfo) }}" class="rounded-2"
                                        alt="" width="80px">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if ($item->writer_id != '')
                                        {{ $item->writer->name }}
                                    @elseif ($item->administrator_id != '')
                                        {{ $item->writerAdmin->name }}
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y,') }} Jam
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td class="text-center">
                                    @foreach ($item->categories as $category)
                                        | {{ $category->name }} | <br>
                                    @endforeach
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="/info-detail/{{ $item->slug }}" class="dropdown-item"><i
                                                    class="fa-solid fa-pen-to-square me-1"></i>
                                                Detail
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#archiveInfo{{ $item->slug }}"><i
                                                    class="fa-solid fa-box-archive me-1"></i>
                                                Arsipkan
                                            </button>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#deleteInfo{{ $item->slug }}"><i
                                                    class="fa-solid fa-trash me-1"></i>
                                                Hapus Permanen
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Delete Info -->
                            <div class="modal fade" id="deleteInfo{{ $item->slug }}" tabindex="-1"
                                data-bs-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="deleteInfoModalLabel1">Apakah Anda ingin
                                                menghapus
                                                Informasi
                                                ini?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/deleteInfo/{{ $item->slug }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <p>
                                                    <br>Judul Informasi: {{ $item->title }}
                                                </p>
                                                <div class="col mb-3">
                                                    <input type="hidden" id="categories" name="categories"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <form action="/archive-info-byAdmin/{{ $item->slug }}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal fade" id="archiveInfo{{ $item->slug }}" tabindex="-1"
                                    aria-labelledby="archiveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteInfoModalLabel1">Apakah Anda ingin
                                                    mengarsipkan
                                                    Informasi
                                                    ini?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <br>Judul Informasi: {{ $item->title }}
                                                </p>
                                                <div class="col mb-3">
                                                    <input type="hidden" id="categories" name="categories"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline-dark">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {!! $info->appends(Request::except('page'))->render() !!}
        </div>
    </div>

@endsection
