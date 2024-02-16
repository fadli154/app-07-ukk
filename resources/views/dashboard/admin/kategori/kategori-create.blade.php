@extends('dashboard.layout.main')

@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Data Kategori</h3>
                        <p class="text-subtitle text-muted">Interface untuk menambah data
                            kategori.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/kategori">Data Kategori</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Kategori
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
                        <h4 class="card-title card-title-action ms-2 mb-0">Form Tambah Data Kategori
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                                id="nama_kategori" value="{{ old('nama_kategori') }}" name="nama_kategori"
                                                placeholder="ex: Romansa" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-tag-fill"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('nama_kategori')
                                                @enderror
                                            </small>
                                        </div>
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
            $('#no_telepon').inputmask('9999-9999-99999');
        });
    </script>


    {{-- Handle view password --}}
    <script>
        $(document).ready(function() {
            $('.form-right-icon').on('click', function() {
                const input = $(this).siblings('input');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('bi-eye-slash').addClass('bi-eye');
                }
            })
        })
    </script>
@endsection
