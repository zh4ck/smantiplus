@extends('niskala.info.nav-info')

@section('title', 'Cari Informasi')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Cari Informasi Berdasarkan Jenis</h2>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-lg-3 gap-2">
                @foreach ($type as $item)
                    <a href="/smantiPlus/searchByType/{{ $item->slug }}">
                        <div class="btn rounded-5 shadow p-lg-5 p-4">
                            <h4 class="fw-medium">{{ $item->name }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <h3 class="text-center mt-5 mb-4">Tag</h3>
        <div class="row">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-lg-2 gap-1">
                @foreach ($category as $item)
                    <a href="/smantiPlus/searchByTag/{{ $item->slug }}">
                        <div class="btn rounded-4 shadow p-lg-3 p-2">
                            <h5 class="fw-medium">#{{ $item->name }}</h5>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
