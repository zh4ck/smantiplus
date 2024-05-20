@extends('niskala.info.nav-info')

@section('title', 'Detail Informasi')

@section('content')
    <link href="{{ asset('assets/assets/css/select-multiple.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <div class="container">
        <div class="m-lg-5 rounded-5 shadow">
            <div class="row">
                <div class="col-12 col-lg-5 p-5">
                    <img id="imagePreview" src="#" alt="Preview" class="card-img-top img-fluid rounded-5 mb-4"
                        style="display: none; cursor: pointer;" onclick="document.getElementById('image').click();">

                    <div class="card rounded-5 mb-3 border border-dashed border-2" id="dropzoneCard"
                        onclick="document.getElementById('image').click();" style="cursor: pointer;">
                        <div class="text-center">
                            <i class="fa-solid fa-circle-arrow-up fa-2x mt-5"></i>
                            <p>Pilih file atau seret dan jatuhkan di sini</p>
                            <p class="my-5 pt-5">
                                Sebaiknya gunakan file .jpg berkualitas tinggi file berukuran kurang
                                dari 20MB
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 py-lg-5 pe-lg-5 px-4 pb-4">
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
                    <form action="/type-add" method="post">
                        @csrf
                        <div class="collapse" id="collapseType">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tambahkan Jenis"
                                    aria-label="Tambahkan Jenis" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <form action="/category-add" method="post">
                        @csrf
                        <div class="collapse" id="collapseCategory">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tambahkan Tag"
                                    aria-label="Tambahkan Tag" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <form action="/addInfo/process" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col mb-2">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Masukkan Judul Informasi"
                                    value="{{ old('title', isset(Session::get('old_input')['title']) ? Session::get('old_input')['title'] : '') }}"
                                    required>
                            </div>
                        </div>

                        <input type="file" id="image" name="image" class="form-control" style="display: none;"
                            onchange="previewImage(event)" accept="image/png, image/jpeg, image/gif" required>

                        <div class="row">
                            <div class="mb-2">
                                <label for="editor" class="form-label">Deskripsi Informasi</label>
                                <textarea class="form-control" id="editor" rows="3" name="description">{{ old('description', isset(Session::get('old_input')['description']) ? Session::get('old_input')['description'] : '') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="type" class="form-label">Jenis Informasi</label>
                                <select name="type_id" id="type" class="form-control">
                                    <option value="1234567890" selected>Pilih Jenis Informasi</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('type', isset(Session::get('old_input')['type']) ? Session::get('old_input')['type'] : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <a class="" style="font-size: 14px;" data-bs-toggle="collapse" href="#collapseType"
                                    role="button" aria-expanded="false" aria-controls="collapseType">
                                    Tambah Jenis
                                </a>

                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="select-category" class="form-label">Tag Informasi <span class="text-warning">
                                        (Bisa Lebih dari 1 Tag)</span></label>
                                <select name="categories[]" id="select-category" class="form-control"
                                    multiple="multiple">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('categories', isset(Session::get('old_input')['categories']) ? Session::get('old_input')['categories'] : [])) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <a class="" style="font-size: 14px;" data-bs-toggle="collapse"
                                    href="#collapseCategory" role="button" aria-expanded="false"
                                    aria-controls="collapseCategory">
                                    Tambah Tag
                                </a>

                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Informasi</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Biasa" selected
                                        {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Biasa' ? 'selected' : '' }}>
                                        Informasi Biasa</option>
                                    <option value="Penting"
                                        {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Penting' ? 'selected' : '' }}>
                                        Informasi Penting</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="/profile" class="btn btn-outline-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-dark">Buat</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/assets/js/select-multiple.js') }}"></script>

    <script>
        new MultiSelectTag('select-category', {
            rounded: true,
            placeholder: 'Cari Tag...',
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- JavaScript untuk Pratinjau Gambar -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            const card = document.getElementById('dropzoneCard');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    card.style.display = 'none'; // Menyembunyikan card ketika file terpilih
                }
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('imagePreview').addEventListener('click', function() {
            const preview = document.getElementById('imagePreview');
            // Hanya memicu klik pada input file jika tidak ada gambar yang ditampilkan
            if (!preview.src || preview.src.endsWith('#')) {
                document.getElementById('image').click();
            }
        });

        document.getElementById('dropzoneCard').addEventListener('drop', function(event) {
            event.preventDefault();
            event.stopPropagation();
            const files = event.dataTransfer.files;
            if (files.length) {
                document.getElementById('image').files = files;
                previewImage({
                    target: {
                        files: files
                    }
                });
            }
        });

        document.getElementById('dropzoneCard').addEventListener('dragover', function(event) {
            event.preventDefault(); // Memastikan file tidak dibuka secara langsung oleh browser
        });
    </script>

    <style>
        #dropzoneCard:hover {
            background-color: #e6e6e6; // Warna latar belakang saat hover
            cursor: pointer; // Cursor tangan saat hover
        }

        #imagePreview {
            cursor: pointer; // Menunjukkan bahwa imagePreview dapat diklik
        }
    </style>
@endsection
