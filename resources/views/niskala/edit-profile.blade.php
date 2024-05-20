@extends('niskala.info.nav-info')

@section('title', 'Edit Profile')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/fonts/boxicons.css') }}" />

    <div class="container">
        @if (Session::has('messageSuccess'))
            <div class="alert alert-success alert-dismissible mx-3" role="alert">
                {{ Session::get('messageSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible mx-3" role="alert">
                {{ Session::get('message') }}
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
        <form action="/edit-profile-save/{{ Auth::guard('student')->user()->slug }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex justify-content-center">
                <div class="div text-center">
                    @if (Auth::guard('student')->user()->profile != '')
                        <img id="imagePreview"
                            src="{{ asset('storage/profile/' . Auth::guard('student')->user()->profile) }}" alt
                            class="profile-picture" style="display: block; margin: 0 auto;" />
                    @else
                        <img id="imagePreview" src="{{ asset('assets/assets/img/profile-default.png') }}" alt
                            class="profile-picture" style="display: block; margin: 0 auto;" />
                    @endif
                    <div class="d-flex justify-content-center my-3 ">
                        <button type="button" class="btn btn-profile">Ganti</button>
                    </div>
                </div>
            </div>
            <input type="file" id="image" name="image" class="form-control" style="display: none;"
                onchange="previewImage(event)" accept="image/png, image/jpeg, image/gif"">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nama : </span>
                <input type="text" name="name" class="form-control" placeholder="Nama" aria-label="Nama"
                    aria-describedby="basic-addon1" value="{{ Auth::guard('student')->user()->name }}" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username : </span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1" value="{{ Auth::guard('student')->user()->username }}" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email : </span>
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                    aria-describedby="basic-addon1" value="{{ Auth::guard('student')->user()->email }}" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Kelas :</span>
                <input type="text" name="class" class="form-control" placeholder="Kelas" aria-label="Kelas"
                    aria-describedby="basic-addon1" value="{{ Auth::guard('student')->user()->class }}" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">No. Telp. : </span>
                <input type="number" name="phone" class="form-control" placeholder="Nomor Telepon"
                    aria-label="Nomor Telepon" aria-describedby="basic-addon1"
                    value="{{ Auth::guard('student')->user()->phone }}" required>
            </div>

            <div class="d-flex justify-content-center my-3">
                <a href="/profile" class="btn btn-outline-secondary rounded-pill me-2">Batal</a>
                <a class="btn btn-outline-dark rounded-pill me-2" data-bs-toggle="collapse" href="#collapseChangePassword"
                    role="button" aria-expanded="false" aria-controls="collapseChangePassword">Ganti Password</a>
                <button type="submit" class="btn btn-dark rounded-pill">Simpan</button>
            </div>
        </form>
        <form action="/change-password" method="post" enctype="multipart/form-data">
            @csrf
            <div class="collapse my-3" id="collapseChangePassword">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="currentPassword" required>Password Lama</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="currentPassword" class="form-control" name="current_password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="newPassword" required>Password Baru</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="newPassword" class="form-control" name="new_password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="repeatPassword" required>Konfirmasi Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="repeatPassword" class="form-control" name="repeat_password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-outline-dark d-grid w-100" type="submit">Simpan Password Baru</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/assets/vendor/js/helpers.js') }}"></script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gantiButton = document.querySelector('.btn-profile');
            const imageInput = document.getElementById('image');

            gantiButton.addEventListener('click', function() {
                imageInput.click();
            });
        });
    </script>

    <script>
        document.querySelectorAll('.form-password-toggle').forEach(function(toggle) {
            const input = toggle.querySelector('input');
            const icon = toggle.querySelector('.bx');

            icon.addEventListener('click', function() {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bx-hide');
                    icon.classList.add('bx-show');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bx-show');
                    icon.classList.add('bx-hide');
                }
            });
        });
    </script>
@endsection
