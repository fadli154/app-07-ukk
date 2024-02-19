@extends('dashboard.layout.main')

@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/form-editor-summernote.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Data Buku</h3>
                        <p class="text-subtitle text-muted">Interface untuk menambah data
                            buku.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/buku">Data Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Buku
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex">
                        <a href="{{ url()->previous() }}" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                        <h4 class="card-title card-title-action ms-2 mb-0">Form Tambah Data Buku
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="created_by" value="{{ auth()->user()->user_id }}">
                            <input type="hidden" name="updated_by" value="{{ auth()->user()->user_id }}">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="isbn" class="form-label">Isbn</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('isbn') is-invalid @enderror"
                                                id="isbn" value="{{ old('isbn') }}" name="isbn"
                                                placeholder="ex: 978-602-7870-41-3">
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('isbn')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="judul" class="form-label">Judul Buku</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                id="judul" value="{{ old('judul') }}" name="judul"
                                                placeholder="ex: Dilan 1990" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-journal-check"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('judul')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                                                value="{{ old('penulis') }}" name="penulis" placeholder="ex: Pidi Baiq"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('penulis')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                                value="{{ old('penerbit') }}" name="penerbit"
                                                placeholder="ex: Pastel Books" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-building-gear"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('penerbit')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('tahun_terbit') is-invalid @enderror"
                                                id="tahun_terbit" value="{{ old('tahun_terbit') }}" name="tahun_terbit"
                                                placeholder="ex: 2015" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-date"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('tahun_terbit')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="stok_buku" class="form-label">Stok Buku</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('stok_buku') is-invalid @enderror"
                                                id="stok_buku" value="{{ old('stok_buku') }}" name="stok_buku"
                                                placeholder="ex: 20" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-journal-x"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('stok_buku')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div class="form-group">
                                        <label for="sinopsis">Sinopsis</label>
                                        <textarea class="form-control summernote" placeholder="Tuliskan Sinopsis" id="sinopsis" cols="30"
                                            rows="10" name="sinopsis" required>{{ old('sinopsis') }}</textarea>
                                        <small class="text-danger">
                                            @error('sinopsis')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div class="form-group">
                                        <label for="kategori_id">Kategori Buku</label>
                                        <select
                                            class="choices form-select @error('kategori_id') is-invalid @enderror multiple-remove"
                                            multiple="" id="kategori_id" name="kategori_id[]" required>
                                            @foreach ($kategoriList as $kategori)
                                                <option value="{{ $kategori->kategori_id }}"
                                                    {{ old('kategori_id') == 'kategori' ? 'selected' : '' }}>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">
                                            @error('kategori_id')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div class="form-group">
                                        <label for="sampul_buku">Sampul Buku</label>
                                        <small class="d-block">Note: masukkan foto format PNG, JPG, JPEG, maksimal
                                            5 MB</small>
                                        <input type="file" id="foto-user" name="sampul_buku"
                                            class="image-preview-filepond" required>
                                        <small class="text-danger">
                                            @error('sampul_buku')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ url()->previous() }}" type="button" class="btn btn-warning text-white">
                                <i class="fas fa-arrow-left me-1"></i>
                                <span>Kembali</span>
                            </a>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-retweet me-1"></i>
                                <span>Reset</span></button>
                            <button type="submit" class="btn btn-primary btn-login"><i class="fas fa-check me-1"></i>
                                <span>Simpan</span></button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <script
        src="{{ asset('assets-UKK/assets-mazer/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/filepond.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/summernote.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    iziToast.error({
                        title: 'Error',
                        message: "{{ $error }}",
                        position: 'topRight'
                    });
                @endforeach
            });
        </script>
    @endif

    {{-- Handle Format Nomor Telepon --}}
    <script>
        $(document).ready(function() {
            $('#isbn').inputmask('999-999-9999-99-9');
        });
    </script>
@endsection
