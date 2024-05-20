@extends('niskala.info.nav-info')

@section('title', 'Detail Informasi')

@section('content')
    <div class="container mb-4">
        <div class="m-lg-5 shadow rounded-5">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img id="imagePreview" src="{{ asset('storage/imgInfo/' . $info->imgInfo) }}"
                        class="card-img-top img-fluid imgInfo" alt="">
                </div>
                <div class="col-12 col-lg-6 p-4 pe-lg-5">
                    <div class="d-flex justify-content-end">
                        @if (Auth::guard('student')->user() && $info->writer_id == Auth::guard('student')->user()->id)
                            <a href="/edit-info/{{ $info->slug }}" class="btn btn-outline-dark rounded-pill me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        @endif
                        @if (!Auth::guard('student')->user())
                            <button type="button" data-bs-toggle="modal" data-bs-target="#noLogin"
                                class="btn btn-outline-dark rounded-pill">Simpan</button>
                        @else
                            @if ($isSavedInfo[$info->id])
                                <form action="/addToCollection/info/{{ $info->slug }}/destroy" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-dark rounded-pill">Disimpan</button>
                                </form>
                            @else
                                <form action="/addToCollection/info/{{ $info->slug }}/post" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark rounded-pill">Simpan</button>
                                </form>
                            @endif
                        @endif
                    </div>
                    @if ($info->status == 'Diarsipkan')
                        <span class="badge text-bg-warning">Informasi ini diarsipkan</span>
                    @endif
                    <h3>{{ $info->title }}</h3>
                    <h5>> {{ $info->type->name }}</h5>
                    <p>{!! $info->description !!}</p>
                    <div class="d-flex mt-3">
                        <div class="rounded-circle" style="width: 45px position: relative;">
                            @if ($info->writer != '' && $info->writer->profile != '')
                                <img src="{{ asset('storage/profile/' . $info->writer->profile) }}" alt
                                    class="profile-circle" style="width: 45px !important; height: 45px !important;" />
                            @elseif ($info->writerAdmin != '' && $info->writerAdmin->profile != '')
                                <img src="{{ asset('storage/profile/' . $info->writerAdmin->profile) }}" alt
                                    class="profile-circle" style="width: 45px !important; height: 45px !important;" />
                            @else
                                <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt class="profile-circle"
                                    style="width: 45px !important; height: 45px !important;" />
                            @endif
                        </div>
                        <div class="ms-2">
                            <div class="fw-bold mt-2" style="line-height: 1;">
                                @if (!$info->writer_id)
                                    {{ $info->writerAdmin->name }}
                                @else
                                    {{ $info->writer->name }}
                                @endif
                            </div>
                            <p class="fw-medium" style="line-height: 1.3;">
                                @if (!$info->writer_id)
                                    @if ($info->writerAdmin->role_id == 1)
                                        Admin
                                    @else
                                        OSIS
                                    @endif
                                @else
                                    {{ $info->writer->class }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr>
                    <h6>Tag :</h6>
                    @foreach ($info->categories as $category)
                        <a href="/smantiPlus/searchByTag/{{ $category->slug }}">#{{ $category->name }}</a>
                    @endforeach
                    <h6 class="mt-3 mb-3">Komentar</h6>
                    @if ($comment->first() == '')
                        <h6 class="fw-light">Belum ada komentar!</h6>
                    @else
                        @foreach ($comment->where('parent_id', null) as $mainComment)
                            <div class="comment d-flex ms-2 my-3">
                                <div class="avatar">
                                    @if ($mainComment->user != '' && $mainComment->user->profile != '')
                                        <img src="{{ asset('storage/profile/' . $mainComment->user->profile) }}" alt
                                            class="profile-circle" />
                                    @elseif ($mainComment->admin != '' && $mainComment->admin->profile != '')
                                        <img src="{{ asset('storage/profile/' . $mainComment->admin->profile) }}" alt
                                            class="profile-circle" />
                                    @else
                                        <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                                            class="profile-circle" />
                                    @endif
                                </div>
                                <div>
                                    <p class="comment ms-2" style="line-height: 1;"><strong class="me-1">
                                            @if ($mainComment->user != null)
                                                {{ $mainComment->user->name }}
                                            @elseif ($mainComment->admin != null)
                                                {{ $mainComment->admin->name }}
                                            @endif
                                        </strong>{{ $mainComment->comment }}
                                    </p>
                                    <div class="d-flex">
                                        <?php
                                        // Waktu dari database (created_at)
                                        $created_at = strtotime($mainComment->created_at);
                                        
                                        // Hitung selisih waktu dalam detik
                                        $time_diff = time() - $created_at;
                                        
                                        // Konversi waktu ke format detik, menit, jam, hari, atau tanggal
                                        if ($time_diff < 60) {
                                            $time_ago = $time_diff . ' detik';
                                        } elseif ($time_diff < 3600) {
                                            $time_ago = floor($time_diff / 60) . ' menit';
                                        } elseif ($time_diff < 86400) {
                                            $time_ago = floor($time_diff / 3600) . ' jam';
                                        } elseif ($time_diff < 2592000) {
                                            // 30 hari (sebulan)
                                            $time_ago = floor($time_diff / 86400) . ' hari';
                                        } else {
                                            $time_ago = date('d-m-Y', $created_at); // Tampilkan tanggal
                                        }
                                        
                                        // Tampilkan waktu yang lalu atau tanggal
                                        echo '<div class="ms-2" style="font-size: 11px;">' . $time_ago . '</div>';
                                        ?>
                                        <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                            <a class="text-dark" data-bs-toggle="collapse"
                                                href="#collapseReplyComment-{{ $mainComment->id }}" role="button"
                                                aria-expanded="false"
                                                aria-controls="collapseReplyComment-{{ $mainComment->id }}">Balas</a>
                                        </div>
                                        @if (Auth::guard('student')->user())
                                            @if (
                                                $info->writer_id == Auth::guard('student')->user()->id ||
                                                    ($mainComment->user_id != null && $mainComment->user_id == Auth::guard('student')->user()->id))
                                                <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                    <a class="text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteCommentModal-{{ $mainComment->id }}">Hapus</a>
                                                </div>
                                            @endif
                                        @elseif (Auth::guard('administrator')->user() && Auth::guard('administrator')->user()->role_id == 2)
                                            @if (
                                                $info->administrator_id == Auth::guard('administrator')->user()->id ||
                                                    ($mainComment->admin_id != null && $mainComment->admin_id == Auth::guard('administrator')->user()->id))
                                                <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                    <a class="text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteCommentModal-{{ $mainComment->id }}">Hapus</a>
                                                </div>
                                            @endif
                                        @elseif (Auth::guard('administrator')->user() && Auth::guard('administrator')->user()->role_id == 1)
                                            <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                <a class="text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteCommentModal-{{ $mainComment->id }}">Hapus</a>
                                            </div>
                                        @endif
                                        @if ($comment->where('parent_id', $mainComment->id)->isNotEmpty())
                                            <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                <a class="text-dark lihat-balasan-btn" data-bs-toggle="collapse"
                                                    href="#collapseReply-{{ $mainComment->id }}" role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapseReply-{{ $mainComment->id }}">Lihat
                                                    Balasan</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="collapse" id="collapseReplyComment-{{ $mainComment->id }}">
                                        @if (Auth::guard('student')->check() || Auth::guard('administrator')->check())
                                            <form action="/replyComment" method="POST">
                                                @csrf
                                                <div class="d-flex">
                                                    <input type="text" name="comment" class="form-control rounded-pill"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Balas @if ($mainComment->user != null) {{ $mainComment->user->name }}
                                            @elseif ($mainComment->admin != null)
                                                {{ $mainComment->admin->name }} @endif..."
                                                        required>
                                                    @if (Auth::guard('student')->check())
                                                        <input type="hidden" name="user_id"
                                                            value="{{ Auth::guard('student')->user()->id }}">
                                                    @elseif (Auth::guard('administrator')->check())
                                                        <input type="hidden" name="admin_id"
                                                            value="{{ Auth::guard('administrator')->user()->id }}">
                                                    @endif
                                                    <input type="hidden" name="info_id" value="{{ $info->id }}">
                                                    <input type="hidden" name="parent_id"
                                                        value="{{ $mainComment->id }}">
                                                    <input type="hidden" name="replyFrom"
                                                        value="{{ $mainComment->id }}">
                                                    <button type="submit"
                                                        class="btn btn-outline-dark rounded-circle ms-2"><i
                                                            class="fa-solid fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            <div class="d-flex">
                                                <input type="text" name="comment" class="form-control rounded-pill"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Balas @if ($mainComment->user != null) {{ $mainComment->user->name }}
                                            @elseif ($mainComment->admin != null)
                                                {{ $mainComment->admin->name }} @endif..."
                                                    required>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#noLogin"
                                                    class="btn btn-outline-dark rounded-circle ms-2"><i
                                                        class="fa-solid fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <form action="/deleteComment/{{ $mainComment->id }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="modal" id="deleteCommentModal-{{ $mainComment->id }}" tabindex="-1"
                                    aria-labelledby="deleteCommentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6>Hapus Komentar ini?</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <strong>
                                                        @if ($mainComment->user != null)
                                                            {{ $mainComment->user->name }}
                                                        @elseif ($mainComment->admin != null)
                                                            {{ $mainComment->admin->name }}
                                                        @endif
                                                    </strong> :
                                                    {{ $mainComment->comment }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="collapse" id="collapseReply-{{ $mainComment->id }}">
                                @foreach ($comment->where('parent_id', $mainComment->id) as $replyComment)
                                    <div class="reply d-flex ms-5 mb-2">
                                        <div class="avatar">
                                            @if ($replyComment->user != '' && $replyComment->user->profile != '')
                                                <img src="{{ asset('storage/profile/' . $replyComment->user->profile) }}"
                                                    alt class="profile-circle" />
                                            @elseif ($replyComment->admin != '' && $replyComment->admin->profile != '')
                                                <img src="{{ asset('storage/profile/' . $replyComment->admin->profile) }}"
                                                    alt class="profile-circle" />
                                            @else
                                                <img src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                                                    class="profile-circle" />
                                            @endif
                                        </div>
                                        <div>
                                            <div class="ms-2" style="font-size: 11px;">Membalas
                                                <strong>
                                                    @if ($replyComment->reply->user != null)
                                                        {{ $replyComment->reply->user->name }}
                                                    @elseif ($replyComment->reply->admin != null)
                                                        {{ $replyComment->reply->admin->name }}
                                                    @endif
                                                </strong>
                                            </div>
                                            <p class="comment ms-2" style="line-height: 1;"><strong class="me-1">
                                                    @if ($replyComment->user != null)
                                                        {{ $replyComment->user->name }}
                                                    @elseif ($replyComment->admin != null)
                                                        {{ $replyComment->admin->name }}
                                                    @endif
                                                </strong>{{ $replyComment->comment }}
                                            </p>
                                            <div class="d-flex">
                                                <?php
                                                // Waktu dari database (created_at)
                                                $created_at = strtotime($replyComment->created_at);
                                                
                                                // Hitung selisih waktu dalam detik
                                                $time_diff = time() - $created_at;
                                                
                                                // Konversi waktu ke format detik, menit, jam, hari, atau tanggal
                                                if ($time_diff < 60) {
                                                    $time_ago = $time_diff . ' detik';
                                                } elseif ($time_diff < 3600) {
                                                    $time_ago = floor($time_diff / 60) . ' menit';
                                                } elseif ($time_diff < 86400) {
                                                    $time_ago = floor($time_diff / 3600) . ' jam';
                                                } elseif ($time_diff < 2592000) {
                                                    // 30 hari (sebulan)
                                                    $time_ago = floor($time_diff / 86400) . ' hari';
                                                } else {
                                                    $time_ago = date('d-m-Y', $created_at); // Tampilkan tanggal
                                                }
                                                
                                                // Tampilkan waktu yang lalu atau tanggal
                                                echo '<div class="ms-2" style="font-size: 11px;">' . $time_ago . '</div>';
                                                ?>
                                                <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                    <a class="text-dark" data-bs-toggle="collapse"
                                                        href="#collapseReplyComment--{{ $replyComment->id }}"
                                                        role="button" aria-expanded="false"
                                                        aria-controls="collapseReplyComment--{{ $replyComment->id }}">Balas</a>
                                                </div>
                                                @if (Auth::guard('student')->user())
                                                    @if (
                                                        $info->writer_id == Auth::guard('student')->user()->id ||
                                                            ($replyComment->user_id != null && $replyComment->user_id == Auth::guard('student')->user()->id))
                                                        <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                            <a class="text-danger" data-bs-toggle="modal"
                                                                data-bs-target="#deleteReplyCommentModal-{{ $replyComment->id }}">Hapus</a>
                                                        </div>
                                                    @endif
                                                @elseif (Auth::guard('administrator')->user() && Auth::guard('administrator')->user()->role_id == 2)
                                                    @if (
                                                        $info->administrator_id == Auth::guard('administrator')->user()->id ||
                                                            ($replyComment->admin_id != null && $replyComment->admin_id == Auth::guard('administrator')->user()->id))
                                                        <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                            <a class="text-danger" data-bs-toggle="modal"
                                                                data-bs-target="#deleteReplyCommentModal-{{ $replyComment->id }}">Hapus</a>
                                                        </div>
                                                    @endif
                                                @elseif (Auth::guard('administrator')->user() && Auth::guard('administrator')->user()->role_id == 1)
                                                    <div class="ms-2" style="font-size: 11px; cursor: pointer;">
                                                        <a class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteReplyCommentModal-{{ $replyComment->id }}">Hapus</a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="collapse" id="collapseReplyComment--{{ $replyComment->id }}">
                                                @if (Auth::guard('student')->check() || Auth::guard('administrator')->check())
                                                    <form action="/replyComment" method="POST">
                                                        @csrf
                                                        <div class="d-flex">
                                                            <input type="text" name="comment"
                                                                class="form-control rounded-pill"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Balas @if ($replyComment->user != null) {{ $replyComment->user->name }}
                                            @elseif ($replyComment->admin != null)
                                                {{ $replyComment->admin->name }} @endif..."
                                                                required>
                                                            @if (Auth::guard('student')->check())
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::guard('student')->user()->id }}">
                                                            @elseif (Auth::guard('administrator')->check())
                                                                <input type="hidden" name="admin_id"
                                                                    value="{{ Auth::guard('administrator')->user()->id }}">
                                                            @endif
                                                            <input type="hidden" name="info_id"
                                                                value="{{ $info->id }}">
                                                            <input type="hidden" name="parent_id"
                                                                value="{{ $mainComment->id }}">
                                                            <input type="hidden" name="replyFrom"
                                                                value="{{ $replyComment->id }}">
                                                            <button type="submit"
                                                                class="btn btn-outline-dark rounded-circle ms-2"><i
                                                                    class="fa-solid fa-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                @else
                                                    <div class="d-flex">
                                                        <input type="text" name="comment"
                                                            class="form-control rounded-pill"
                                                            id="exampleFormControlInput1"
                                                            placeholder="Balas @if ($replyComment->user != null) {{ $replyComment->user->name }}
                                                            @elseif ($replyComment->admin != null)
                                                                    {{ $replyComment->admin->name }} @endif..."
                                                            required>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#noLogin"
                                                            class="btn btn-outline-dark rounded-circle ms-2"><i
                                                                class="fa-solid fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- modal --}}
                                    <form action="/deleteComment/{{ $replyComment->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal" id="deleteReplyCommentModal-{{ $replyComment->id }}"
                                            tabindex="-1" aria-labelledby="deleteCommentModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>Hapus Komentar ini?</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <strong>
                                                                @if ($replyComment->user != null)
                                                                    {{ $replyComment->user->name }}
                                                                @elseif ($replyComment->admin != null)
                                                                    {{ $replyComment->admin->name }}
                                                                @endif
                                                            </strong> :
                                                            {{ $replyComment->comment }}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn btn-outline-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                <div class="ms-5" style="font-size: 11px; cursor: pointer;">
                                    <a class="text-dark lihat-balasan-btn" data-bs-toggle="collapse"
                                        href="#collapseReply-{{ $mainComment->id }}" role="button"
                                        aria-expanded="false" aria-controls="collapseReply-{{ $mainComment->id }}">Tutup
                                        Balasan</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if (Auth::guard('student')->check() || Auth::guard('administrator')->check())
                        <form action="/comment" method="POST">
                            @csrf
                            <div class="mt-4 mb-3 d-flex align-items-end">
                                <input type="text" name="comment" class="form-control rounded-pill" id="comment"
                                    placeholder="Tambahkan Komentar" required>
                                <input type="hidden" name="info_id" value="{{ $info->id }}">
                                @if (Auth::guard('student')->check())
                                    <input type="hidden" name="user_id"
                                        value="{{ Auth::guard('student')->user()->id }}">
                                @elseif (Auth::guard('administrator')->check())
                                    <input type="hidden" name="admin_id"
                                        value="{{ Auth::guard('administrator')->user()->id }}">
                                @endif
                                <button type="submit" class="btn btn-outline-dark rounded-circle ms-2"><i
                                        class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="mt-4 mb-3 d-flex align-items-end">
                            <input type="text" name="comment" class="form-control rounded-pill" id="comment"
                                placeholder="Tambahkan Komentar" required>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#noLogin"
                                class="btn btn-outline-dark rounded-circle ms-2"><i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- modal login --}}
    <div class="modal fade" id="noLogin" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                @if (Auth::guard('administrator')->check())
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="m-0 fw-medium">Anda harus login sebagai siswa untuk bisa menyimpan informasi!</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">oke</button>
                    </div>
                @else
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="m-0">Anda belum login!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="/login" class="btn btn-dark">Login</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
