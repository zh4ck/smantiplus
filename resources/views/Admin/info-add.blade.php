@extends('layouts.mainLayout')

@section('title', 'Tambah Informasi')

@section('content')
    <link href="{{ asset('assets/assets/css/select-multiple.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Form Tambah Informasi</h5>
                @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible mx-3" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/addInfo-proses" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="mb-2">
                                <label for="type" class="form-label">Jenis Informasi</label>
                                <select name="type_id" id="type" class="form-control">
                                    <option selected>Pilih Jenis Informasi</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('type', isset(Session::get('old_input')['type']) ? Session::get('old_input')['type'] : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="select-category" class="form-label">Kategori Informasi <span
                                        class="text-warning">
                                        (Bisa Lebih dari 1 Kategori)</span></label>
                                <select name="categories[]" id="select-category" class="form-control" multiple="multiple">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('categories', isset(Session::get('old_input')['categories']) ? Session::get('old_input')['categories'] : [])) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-2">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Masukkan Judul Informasi"
                                    value="{{ old('title', isset(Session::get('old_input')['title']) ? Session::get('old_input')['title'] : '') }}"
                                    required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-2">
                                <label for="image" class="form-label">Gambar</label>
                                <img id="imagePreview" src="#" alt="Preview" style="display:none; max-width: 200px;"
                                    class="mb-3">
                                <input type="file" id="image" name="image" class="form-control"
                                    onchange="previewImage(event)" accept="image/png, image/jpeg, image/gif" required>
                                <span class="text-warning">Sebaiknya gunakan file .jpg berkualitas tinggi file berukuran
                                    kurang
                                    dari 20MB</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="editor" class="form-label">Deskripsi Informasi</label>
                                <textarea class="form-control" id="editor" rows="3" name="description">{{ old('description', isset(Session::get('old_input')['description']) ? Session::get('old_input')['description'] : '') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="status" class="form-label">Status Informasi</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected>Pilih Status Informasi</option>
                                    <option value="Penting"
                                        {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Penting' ? 'selected' : '' }}>
                                        Informasi Penting</option>
                                    <option value="Biasa"
                                        {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Biasa' ? 'selected' : '' }}>
                                        Informasi Biasa</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <a href="/info" class="btn btn-outline-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/assets/js/select-multiple.js') }}"></script>

    <script>
        new MultiSelectTag('select-category', {
            rounded: true,
            placeholder: 'Cari Kategori...',
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
