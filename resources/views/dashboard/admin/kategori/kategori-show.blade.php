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
                        <h3>Detail Data Kategori</h3>
                        <p class="text-subtitle text-muted">Interface untuk detail data
                            kategori.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/kategori">Data Kategori</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Kategori
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="/kategori" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 ">Form Detail Data Kategori
                                    </h4>
                                </div>

                                @can('admin-petugas')
                                    <div class="btn-group ">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="bi bi-wrench-adjustable me-2"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                <a class="dropdown-item text-warning" href="{{ route('kategori.edit', $kategoriDetail->slug) }}"><i
                                                        class="bi bi-pen-fill me-2"></i>
                                                    Edit</a>
                                                <form action="{{ route('kategori.destroy', $kategoriDetail->slug) }}" method="post" class="form-destroy">
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
                                @endcan
                            </div>
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                                <div class="position-relative">
                                                    <input type="text" value="{{ $kategoriDetail->nama_kategori }}"
                                                        class="form-control @error('nama_kategori') is-invalid @enderror"
                                                        id="nama_kategori" name="nama_kategori" placeholder="ex: Romansa"
                                                        disabled>
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
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="created_by" class="form-label">Created By</label>
                                                <div class="position-relative">
                                                    <input type="text" value="{{ $created_by }}"
                                                        class="form-control @error('created_by') is-invalid @enderror"
                                                        id="created_by" name="created_by" placeholder="ex: Romansa"
                                                        disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('created_by')
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="updated_by" class="form-label">Updated By</label>
                                                <div class="position-relative">
                                                    <input type="text" value="{{ $updated_by }}"
                                                        class="form-control @error('updated_by') is-invalid @enderror"
                                                        id="updated_by" name="updated_by" placeholder="ex: Romansa"
                                                        disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('nama_kategori')
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="/kategori" type="button" class="btn btn-warning text-white">
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
                    text: "Ingin menghapus data kategori ini!",
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
