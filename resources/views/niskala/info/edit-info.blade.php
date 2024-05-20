@extends('niskala.info.nav-info')

@section('title', 'Edit Informasi')

@section('content')
    <link href="{{ asset('assets/assets/css/select-multiple.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <div class="container">
        <div class="m-lg-5 rounded-5 shadow">
            <div class="row">
                @if (Session::has('message'))
                    <div class="mt-5">
                        <div class="alert alert-danger alert-dismissible mx-3" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (Session::has('messageSuccess'))
                    <div class="mt-5">
                        <div class="alert alert-success alert-dismissible mx-3" role="alert">
                            {{ Session::get('messageSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="col-12 col-lg-5 p-5">
                    <img id="imagePreview" src="{{ asset('storage/imgInfo/' . $info->imgInfo) }}" alt="Preview"
                        class="card-img-top img-fluid rounded-5 mb-4" style="cursor: pointer;"
                        onclick="document.getElementById('image').click();">
                </div>
                <div class="col-12 col-lg-7 py-lg-5 pe-lg-5 px-4 pb-4">
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
                    <form action="/edit-info/{{ $info->slug }}/process" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col mb-2">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Masukkan Judul Informasi" value="{{ $info->title }}" required>
                            </div>
                        </div>

                        <input type="file" id="image" name="image" class="form-control" style="display: none;"
                            onchange="previewImage(event)" accept="image/png, image/jpeg, image/gif">

                        <div class="row">
                            <div class="mb-2">
                                <label for="editor" class="form-label">Deskripsi Informasi</label>
                                <textarea class="form-control" id="editor" rows="3" name="description">{!! $info->description !!}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2">
                                <label for="type" class="form-label">Jenis Informasi</label>
                                <select name="type_id" id="type" class="form-control">
                                    <option value="{{ $info->type->id }}" selected>{{ $info->type->name }}</option>
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
                                    @foreach ($info->categories as $category)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}
                                        </option>
                                    @endforeach
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

                        @if ($info->status != 'Diarsipkan')
                            <div class="row">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Informasi</label>
                                    <select name="status" id="status" class="form-control">
                                        @if ($info->status == 'Penting')
                                            <option value="Penting" selected
                                                {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Penting' ? 'selected' : '' }}>
                                                Informasi Penting</option>
                                            <option value="Biasa"
                                                {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Biasa' ? 'selected' : '' }}>
                                                Informasi Biasa</option>
                                        @elseif ($info->status == 'Biasa')
                                            <option value="Biasa" selected
                                                {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Biasa' ? 'selected' : '' }}>
                                                Informasi Biasa</option>
                                            <option value="Penting"
                                                {{ old('status', isset(Session::get('old_input')['status']) ? Session::get('old_input')['status'] : '') == 'Penting' ? 'selected' : '' }}>
                                                Informasi Penting</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="text-end">
                            <a href="/profile/created" class="mb-3 btn btn-outline-secondary me-2">Batal</a>
                            <button type="button" class="mb-3 btn btn-outline-danger me-2" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Hapus</button>
                            @if ($info->status != 'Diarsipkan')
                                <button type="button" class="mb-3 btn btn-outline-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#archiveModal">Arsipkan</button>
                            @else
                                <button type="button" class="mb-3 btn btn-outline-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#publishModal">Pulihkan</button>
                            @endif
                            <button type="submit" name="submit" class="mb-3 btn btn-dark me-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($info->status != 'Diarsipkan')
        <!-- Modal -->
        <form action="/archive-info/{{ $info->slug }}" method="post">
            @csrf
            @method('put')
            <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            Arsipkan Informasi ini?
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
    @else
        <!-- Modal -->
        <form action="/publish/{{ $info->slug }}" method="post">
            @csrf
            @method('put')
            <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="publishModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6>Pilih Status Informasi</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row px-2">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-dark">Pulihkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <!-- Modal -->
    <form action="/delete-info/{{ $info->slug }}" method="post">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-danger">
                        Hapus Permanen Informasi ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-danger">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2C7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
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

    <style>
        #imagePreview {
            cursor: pointer; // Menunjukkan bahwa imagePreview dapat diklik
        }
    </style>
@endsection
