@extends('niskala.info.nav-info')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container-info">
        @foreach ($info as $item)
            <div class="box position-relative">
                <img src="{{ asset('storage/imgInfo/' . $item->imgInfo) }}">
                <div class="text position-absolute bottom-0 end-0 start-0 top-0 w-100 h-100 p-3 d-flex align-items-end">
                    <a href="{{ url('/smantiPlus/detail-info/' . $item->slug) }}" class="stretched-link"></a>
                    <div class="d-flex align-items-start flex-column">
                        <div>
                            <div class="d-flex">
                                <span
                                    class="date text-white">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y, H:i') }}
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
                    <!-- Tombol Simpan -->
                    @if (Auth::guard('student')->user())
                        <button class="btn btn-outline-light save" data-info-slug="{{ $item->slug }}"
                            data-saved="{{ $isSavedInfo[$item->id] ? 'true' : 'false' }}">
                            {{ $isSavedInfo[$item->id] ? 'Tersimpan' : 'Simpan' }}
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.save', function() {
                var button = $(this);
                var infoSlug = button.data('info-slug');
                var isSaved = button.data('saved') === 'true'; // Konversi string ke boolean

                // Nonaktifkan tombol untuk mencegah double-click
                button.prop('disabled', true);

                $.ajax({
                    url: '/addToCollection/info/' + infoSlug + (isSaved ? '/destroy' : '/post'),
                    type: 'POST', // Menggunakan POST untuk kedua kasus
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: isSaved ? 'DELETE' : 'POST' // Method spoofing
                    },
                    success: function(response) {
                        if (isSaved) {
                            button.data('saved',
                                'false'); // Menggunakan data() untuk mengubah status
                            button.text('Simpan');
                        } else {
                            button.data('saved',
                                'true'); // Menggunakan data() untuk mengubah status
                            button.text('Tersimpan');
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        // Aktifkan kembali tombol setelah proses selesai
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>

@endsection
