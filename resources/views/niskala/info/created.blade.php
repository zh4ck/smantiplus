@extends('niskala.info.nav-info')

@section('title', 'Profile')

@section('content')
    <div class="container">
        @if (Session::has('messageSuccess'))
            <div class="alert alert-success alert-dismissible mx-3" role="alert">
                {{ Session::get('messageSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <div class="div text-center">
                @if (Auth::guard('student')->user()->profile != '')
                    <img src="{{ asset('storage/profile/' . Auth::guard('student')->user()->profile) }}" alt
                        class="profile-picture" />
                @else
                    <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt class="profile-picture" />
                @endif
                <h3 class="mt-3">{{ Auth::guard('student')->user()->name }}</h3>
                <h6 class="fw-medium">Username : {{ Auth::guard('student')->user()->username }}</h6>
                <h6 class="fw-medium">Email : {{ Auth::guard('student')->user()->email }}</h6>
                <h6 class="fw-medium">Kelas : {{ Auth::guard('student')->user()->class }}</h6>
                <h6 class="fw-medium">No Telp : {{ Auth::guard('student')->user()->phone }}</h6>

                <div class="d-flex justify-content-center mt-3">
                    @if (Auth::guard('student')->user()->role_id == 3)
                        <a href="/addInfo" class="btn btn-profile me-2">Buat Info</a>
                    @else
                        <button type="button" class="btn btn-profile me-2" data-bs-toggle="modal"
                            data-bs-target="#requestWriterModal">
                            Buat Info
                        </button>
                    @endif
                    <a href="/edit-profile" class="btn btn-profile">Edit Profil</a>
                </div>
                <div class="d-flex mt-5">
                    <a href="/profile" class="btn btn-menu">Disimpan</a>
                    <a href="/profile/created" class="btn btn-menu-active">Dibuat</a>
                    @if (
                        $createdInfo->contains(function ($info) {
                            return $info->status == 'Diarsipkan';
                        }) && Auth::guard('student')->user()->role_id == 3)
                        <a href="/archived" class="btn btn-menu">Diarsipkan</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($createdInfo->first() == '' && Auth::guard('student')->user()->role_id == 3)
        <h5 class="text-center mt-4 fw-medium">Belum ada informasi yang dibuat</h5>
    @elseif ($createdInfo->first() == '' && Auth::guard('student')->user()->role_id == 4)
        <h5 class="text-center mt-4 fw-medium">Belum ada yang bisa ditampilkan! Anda bukan penulis informasi</h5>
        <p class="text-center mt-2 fw-medium">Minta persetujuan dari OSIS atau administrator untuk menjadi penulis dan
            membuat informasi.</p>
        <div class="d-flex justify-content-center mt-2">
            <button type="button" class="btn btn-profile" data-bs-toggle="modal" data-bs-target="#requestWriterModal">
                Minta Persetujuan
            </button>
        </div>
    @elseif ($createdInfo->first() != '' && Auth::guard('student')->user()->role_id == 3)
        <div class="container-info mt-3">
            @foreach ($createdInfo as $item)
                @if ($item->status == 'Penting' || $item->status == 'Biasa')
                    <div class="box position-relative">
                        <img src="{{ asset('storage/imgInfo/' . $item->imgInfo) }}">
                        <div
                            class="text position-absolute bottom-0 end-0 start-0 top-0 w-100 h-100 p-3 d-flex align-items-end">
                            <a href="{{ url('/smantiPlus/detail-info/' . $item->slug) }}" class="stretched-link"></a>
                            <div class="d-flex align-items-start flex-column">
                                <div>
                                    <div class="d-flex">
                                        <span
                                            class="date text-white">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y,') }}
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}
                                            @if ($item->status == 'Penting')
                                                <i class="fa-solid fa-star ms-1 text-warning"></i>
                                            @endif
                                        </span>
                                    </div>
                                    <h6 class="text-white">{{ $item->title }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 position-absolute end-0 top-0 mt-3 me-3" style="z-index: 2;">
                            <a href="/edit-info/{{ $item->slug }}" class="btn btn-outline-light save">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    <!-- Modal -->
    <form action="/requestRole" method="post">
        @csrf
        @method('put')
        <div class="modal fade" id="requestWriterModal" tabindex="-1" aria-labelledby="requestWriterModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Minta persetujuan untuk menjadi penulis?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-dark">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
