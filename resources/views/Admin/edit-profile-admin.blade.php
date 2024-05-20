@extends('layouts.mainLayout')

@section('title', 'Edit Profile')

@section('content')
    @if (Session::has('messageSuccess'))
        <div class="alert alert-success alert-dismissible mx-3" role="alert">
            {{ Session::get('messageSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="row">
                        <h5 class="card-header">Edit Profile</h5>
                        <form action="/edit-profile-admin/{{ Auth::guard('administrator')->user()->slug }}/process"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center">
                                    @if (Auth::guard('administrator')->user()->profile != '')
                                        <img id="imagePreview"
                                            src="{{ asset('storage/profile/' . Auth::guard('administrator')->user()->profile) }}"
                                            class="rounded" height="120px" width="120px" alt=""
                                            style="display: block; margin: 0 auto;">
                                    @else
                                        <img id="imagePreview" src="{{ asset('assets/assets/img/profile-default.png') }}"
                                            class="rounded" height="120px" width="120px" alt=""
                                            style="display: block; margin: 0 auto;">
                                    @endif
                                </div>
                                <div class="col my-3 d-flex justify-content-center">
                                    <button type="button" class="btn btn-outline-dark"
                                        onclick="document.getElementById('image').click();">Ganti</button>
                                    <input type="file" id="image" name="image" class="form-control"
                                        style="display: none;" onchange="previewImage(event)"
                                        accept="image/png, image/jpeg, image/gif">
                                </div>
                                <div class="col mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ Auth::guard('administrator')->user()->name }}" required>
                                </div>
                                <div class="col mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ Auth::guard('administrator')->user()->username }}" required>
                                </div>
                                <div class="col mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ Auth::guard('administrator')->user()->email }}" required>
                                </div>
                                <div class="col mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ Auth::guard('administrator')->user()->phone }}" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-primary mb-2">Simpan</button>
                                    <a href="/profile-admin" class="btn btn-outline-secondary mb-2">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Pratinjau Gambar -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
