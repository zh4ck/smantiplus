@extends('layouts.mainLayout')

@section('title', 'Jenis')

@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Daftar Permintaan Siswa Menjadi Penulis</h5>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Kelas</th>
                        <th>No.Telp</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($userRequest as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->class }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                    data-bs-target="#approveModal-{{ $item->slug }}">
                                    Terima
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <form action="/requestRole-approve/{{ $item->slug }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal fade" id="approveModal-{{ $item->slug }}" tabindex="-1"
                                aria-labelledby="approverModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>
                                                Terima persetujuan {{ $item->name }} untuk menjadi penulis?
                                            </h5>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
