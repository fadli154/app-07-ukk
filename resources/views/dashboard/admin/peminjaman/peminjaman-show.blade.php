@extends('dashboard.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Detail Data Peminjaman</h3>
                        <p class="text-subtitle text-muted">Interface untuk detail data
                            peminjaman.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/peminjaman">Data Peminjaman</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Peminjaman
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <a href="#" class="position-absolute top-0 left-0 ms-2 mt-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Data peminjam"><i class="bi bi-exclamation-circle"></i></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column text-capitalize">
                                    <div class="avatar avatar-2xl">
                                        <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}" alt="Avatar">
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mt-3"></h3>
                                        <p class="text-small"> | </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a href="#" class="position-absolute top-0 left-0 ms-2 mt-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Data buku yang dipinjam"><i
                                    class="bi bi-exclamation-circle"></i></a>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column text-capitalize">
                                    <div class="wrapper-sampul-buku d-flex justify-content-center ">
                                        <img src="{{ asset('assets-UKK/img/no-image.png') }}" alt="sampul-buku"
                                            class="w-50 rounded-3">
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mt-3"></h3>
                                        <p class="text-small"> | </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="/peminjaman" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 ">Form Detail Data Peminjaman
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
                                            <a class="dropdown-item text-warning" href="#"><i
                                                    class="bi bi-pen-fill me-2"></i>
                                                Edit</a>
                                            <form action="#" method="post" class="form-destroy">
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
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="name" class="form-label">Nama Peminjam</label>
                                                <div class="position-relative">
                                                    <input type="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="" id="name" name="name"
                                                        placeholder="ex: fadli154@gmail.com" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="buku_id" class="form-label">Buku yang dipinjam</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('buku_id') is-invalid @enderror"
                                                        id="buku_id" name="buku_id" placeholder="ex: 0878-2730-33278"
                                                        disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-book-half"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                                        id="tanggal_pinjam" name="tanggal_pinjam"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                                        id="tanggal_kembali" name="tanggal_kembali"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_kembali_fisik" class="form-label">Tanggal
                                                    Kembali Fisik </label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('tanggal_kembali_fisik') is-invalid @enderror"
                                                        id="tanggal_kembali_fisik" name="tanggal_kembali_fisik"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('jumlah_pinjam') is-invalid @enderror"
                                                        id="jumlah_pinjam" name="jumlah_pinjam"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="status" class="form-label">Status</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        id="status" name="status" placeholder="ex: 0878-2730-33278"
                                                        disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-question-circle"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="created_by" class="form-label">Created By</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('created_by') is-invalid @enderror"
                                                        id="created_by" name="created_by"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="updated_by" class="form-label">Updated By</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('updated_by') is-invalid @enderror"
                                                        id="updated_by" name="updated_by"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-list-ol"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="/peminjaman" type="button" class="btn btn-warning text-white">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        <span>Kembali</span>
                                    </a>
                                </form>
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
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/input-mask/jquery.inputmask.bundle.min.js') }}"></script>


    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data peminjaman ini!",
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
