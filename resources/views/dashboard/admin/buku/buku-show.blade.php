@extends('dashboard.layout.main')


@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.css') }}">
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
                        <h3>Detail Data Buku</h3>
                        <p class="text-subtitle text-muted">Interface untuk detail data
                            buku.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/buku">Data Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Buku
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="/buku" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 ">Detail Data Buku
                                    </h4>
                                </div>

                                <div class="btn-group ">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                            id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="bi bi-wrench-adjustable me-2"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                            <a class="dropdown-item text-warning" href=""><i
                                                    class="bi bi-pen-fill me-2"></i>
                                                Edit</a>
                                            <form action="" method="post" class="form-destroy">
                                                @method('DELETE')
                                                @csrf
                                                <a class="dropdown-item text-danger btn-destroy" href="#">
                                                    <is class="fas fa-trash me-2 btn-destroy"></is>
                                                    Hapus
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p> <i class="bi bi-journal-check me-2 text-bold"></i>
                                                <span class="me-2 text-bold">Judul buku: <span class="text-primary">Dilan
                                                        1990</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                            <p> <i class="bi bi-person-check-fill me-2 text-bold"></i>
                                                <span class="me-2 text-bold">Penulis buku: <span class="text-primary">Pidi
                                                        Baiq</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                            <p> <i class="bi bi-building-gear me-2 text-bold"></i>
                                                <span class="me-2 text-bold">Penerbit buku: <span
                                                        class="text-primary">Gramedia</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                            <p> <i class="bi bi-calendar-date me-2 text-bold"></i>
                                                <span class="me-2 text-bold">Tahun terbit buku: <span class="text-primary">
                                                        2015</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                            <p> <i class="bi bi-list-ol me-2 text-bold"></i>
                                                <span class="me-2 text-bold">ISBN buku: <span
                                                        class="text-primary">978-602-7870-41-3</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                            <p> <i class="bi bi-journal-x me-2 text-bold"></i>
                                                <span class="me-2 text-bold">Stok buku: <span
                                                        class="text-primary">10</span></span>
                                                <span class="text-primary"></span>
                                            </p>
                                        </div>
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="sinopsis" class="form-label title-label">Sinopsis</label>
                                                <textarea class="form-control mt-3 summernote-disabled" id="sinopsis" cols="30" rows="10" name="sinopsis"
                                                    readonly></textarea>
                                                <small class="text-danger">
                                                    @error('sinopsis')
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="kategori_id" class="form-label title-label">Kategori
                                                    Buku</label>
                                                <select
                                                    class="choices form-select @error('kategori_id') is-invalid @enderror multiple"
                                                    multiple="" id="kategori_id" name="kategori_id[]" disabled>
                                                    <option value=""
                                                        {{ 'kategori' == 'kategori' ? 'selected' : '' }}>
                                                        akkakz
                                                    </option>
                                                </select>
                                                <small class="text-danger">
                                                    @error('kategori_id')
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="/buku" type="button" class="btn btn-warning text-white">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        <span>Kembali</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body position-relative">
                                <form action="" method="post" class="form-koleksi">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="">
                                    <a href="#" class="position-absolute btn-koleksi btn-kolek"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Tambah ke koleksi pribadi">
                                        <i class="bi bi-bookmark-plus btn-kolek text-warning fs-3"></i>
                                    </a>
                                </form>
                                <form action="" method="post" class="form-unkolek">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" class="position-absolute btn-koleksi btn-unkolek"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Hapus dari koleksi pribadi">
                                        <i class="bi bi-bookmark-heart-fill btn-unkolek text-warning fs-3"></i>
                                    </a>
                                </form>
                                <div class="d-flex justify-content-center align-items-center flex-column text-capitalize">
                                    <div class="wrapper-sampul-buku d-flex justify-content-center ">
                                        <img src="{{ asset('assets-UKK/img/no-image.png') }}" alt="sampul-buku"
                                            class="w-50 rounded-3">
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mt-3">Dilan 1990</h3>
                                        <small class="text-small">Pidi Baiq |
                                            Gramedia</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label for="ulasan" class="form-label title-label">Buat ulasan</label>
                            </div>
                            <div class="card-body">
                                <form action="" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="">
                                    <div class="col-sm-12 mb-1">
                                        <div class="form-group">
                                            <textarea class="form-control summernote" placeholder="Tuliskan Ulasan" id="ulasan" cols="30"
                                                rows="10" name="ulasan">{{ old('ulasan') }}</textarea>
                                            <small class="text-danger">
                                                @error('ulasan')
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-1">
                                        <div class="form-group">
                                            <label for="foto_ulasan">Foto ulasan</label>
                                            <small class="d-block">Note: masukkan foto format PNG, JPG, JPEG, maksimal
                                                5 MB</small>
                                            <input type="file" id="foto-user" name="foto_ulasan"
                                                class="image-preview-filepond">
                                            <small class="text-danger">
                                                @error('foto_ulasan')
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <label for="rating" class="form-label title-label">Rating buku Dilan 1990</label>
                                    <div class="rating mt-2 position-absolute left-0">
                                        <input type="radio" id="star-1" name="rating" value="5">
                                        <label for="star-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path pathLength="360"
                                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="radio" id="star-2" name="rating" value="4">
                                        <label for="star-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path pathLength="360"
                                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="radio" id="star-3" name="rating" value="3">
                                        <label for="star-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path pathLength="360"
                                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="radio" id="star-4" name="rating" value="2">
                                        <label for="star-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path pathLength="360"
                                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="radio" id="star-5" name="rating" value="1">
                                        <label for="star-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path pathLength="360"
                                                    d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="submit" class="btn btn-success " data-bs-dismiss="modal"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Simpan data perubahan">
                                            <i class="bi bi-check-circle-fill me-1"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label for="ulasan" class="form-label title-label">Ulasan buku
                                    Dilan 1990</label>
                            </div>
                            <div class="card-body position-relative">
                                <div class="ulasan-user">
                                    <div class="d-flex">
                                        <div class="avatar avatar-lg avatar-ulasan">
                                            <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}">
                                        </div>
                                        <div class="align-self-center text-capitalize mt-2">
                                            <h6 class="mb-0">Fadli Hifziansyah</h6>
                                            <p class="mb-0 text-sm text-primary">Admin</p>
                                        </div>
                                    </div>
                                    <div class="d-block p-4">
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Molestias error nostrum at possimus voluptatem porro pariatur quos eos magnam
                                            dolorum?</p>
                                        <small>12-12-2022</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/tinymce.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/summernote.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.js') }}"></script>
    <script
        src="{{ asset('assets-UKK/assets-mazer/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/filepond.js') }}"></script>


    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");
            const formKoleksi = document.body.querySelector(".form-koleksi");
            const formUnkolek = document.body.querySelector(".form-unkolek");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data buku ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        element.closest('form').submit();
                    }
                });
            }

            if (element.classList.contains('btn-kolek')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin mengkoleksi buku ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, koleksi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        element.closest('form').submit();
                    }
                });
            }

            if (element.classList.contains('btn-unkolek')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus dari koleksi anda!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, hapus koleksi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        element.closest('form').submit();
                    }
                });
            }
        })
    </script>

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

    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                iziToast.success({
                    title: 'Success',
                    message: "{{ Session::get('success') }}",
                    position: 'topRight'
                })
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
