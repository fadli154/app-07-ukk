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
                        <h3>Detail Data Users</h3>
                        <p class="text-subtitle text-muted">Interface untuk detail data
                            users.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/users">Data Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Users
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
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column text-capitalize">
                                    <div class="avatar avatar-2xl">
                                        <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}" alt="Avatar">
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mt-3">Fadlis hifziansyah</h3>
                                        <p class="text-small">Pdhliii | Admin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="/users" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 ">Form Detail Data Users
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
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="email" class="form-label">Email address</label>
                                                <div class="position-relative">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="" id="email" name="email"
                                                        placeholder="ex: fadli154@gmail.com" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope-at"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('email')
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                <div class="position-relative">
                                                    <input type="text" value=""
                                                        class="form-control @error('no_telepon') is-invalid @enderror"
                                                        id="no_telepon" name="no_telepon" placeholder="ex: 0878-2730-33278"
                                                        disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-telephone-fill"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('no_telepon')
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="choices form-select @error('jk') is-invalid @enderror"
                                                    id="jk" name="jk" disabled>
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="L" disabled {{ 'L' == 'L' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="P" disabled {{ 'P' == 'P' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                                <small class="text-danger">
                                                    @error('jk')
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="roles">Roles Users</label>
                                                <select class="choices form-select @error('roles') is-invalid @enderror"
                                                    id="roles" name="roles" disabled>
                                                    <option value="" selected disabled>Pilih Roles Users</option>
                                                    <option value="admin" disabled
                                                        {{ 'role' == 'admin' ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="petugas" disabled
                                                        {{ 'role' == 'petugas' ? 'selected' : '' }}>
                                                        Petugas
                                                    </option>
                                                    <option value="peminjam" disabled
                                                        {{ 'role' == 'peminjam' ? 'selected' : '' }}>
                                                        Peminjam
                                                    </option>
                                                </select>
                                                <small class="text-danger">
                                                    @error('roles')
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <div class="position-relative">
                                                    <input type="text" value="tanggal_lahir"
                                                        class="form-control @error('tanggal_lashir') is-invalid @enderror"
                                                        id="tanggal_lahir" name="tanggal_lahir"
                                                        placeholder="ex: 0878-2730-33278" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-check"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                        @error('tanggal_lahir')
                                                        @enderror
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" rows="3" name="alamat" disabled>Alamat</textarea>
                                                <small class="text-danger">
                                                    @error('alamat')
                                                    @enderror
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="/users" type="button" class="btn btn-warning text-white">
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
                    text: "Ingin menghapus data user ini!",
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
