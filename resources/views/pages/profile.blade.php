@extends('dashboard.layout.main')


@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Profile Fadli Hifziansyah</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat profile data
                            anda.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile Users
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="col-12">
                            <div class="card">
                                @if ($profileDetail->status_aktif == 'Y')
                                    <span class="text-success position-absolute status-aktif" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="User aktif">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </span>
                                @else
                                    <span class="text-danger position-absolute status-aktif" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="User tidak aktif">
                                        <i class="bi bi-patch-exclamation-fill"></i>
                                    </span>
                                @endif
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-center align-items-center flex-column text-capitalize">
                                        @if ($profileDetail->foto_user)
                                            <div class="avatar avatar-2xl">
                                                <img src="{{ asset('storage/foto_user/' . $profileDetail->foto_user) }}"
                                                    alt="Avatar">
                                            </div>
                                        @else
                                            <div class="avatar avatar-2xl">
                                                <img src="{{ asset('assets-UKK/img/no-foto-woman.png') }}" alt="Avatar">
                                            </div>
                                        @endif

                                        <div class="text-center">
                                            <h3 class="mt-3">{{ $profileDetail->name }}</h3>
                                            <p class="text-small">{{ $profileDetail->username }} | {{ $profileDetail->roles }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($profileDetail->roles == 'peminjam')
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped table-hover" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Buku</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($peminjamanList as $peminjaman)
                                                    <tr>
                                                        <td>{{ $peminjaman->buku->judul }}</td>
                                                        <td>{{ $peminjaman->jumlah_pinjam }}</td>
                                                        <td>
                                                            <button
                                                                class="disabled btn btn-outline-{{ $peminjaman->status == 'dikembalikan' ? 'success' : 'warning' }} text-capitalize"
                                                                data-bs-toggle="modal" data-bs-target="#success1">
                                                                Dipinjam
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="/users" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 ">Form Profile Data Users
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
                                            <a class="dropdown-item text-info" href="{{ route('profile.edit') }}"><i
                                                    class="bi bi-person-lock me-2"></i>
                                                Change profile</a>
                                            <a class="dropdown-item text-warning" href="{{ route('password.edit') }}"><i
                                                    class="bi bi-key me-2"></i>
                                                Change password</a>
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
                                                        value="{{ $profileDetail->email }}" id="email" name="email"
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
                                                    <input type="text" value="{{ $profileDetail->no_telepon }}"
                                                        class="form-control @error('no_telepon') is-invalid @enderror"
                                                        id="no_telepon" name="no_telepon"
                                                        placeholder="ex: 0878-2730-33278" disabled>
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
                                                    <option value="L" disabled {{  $profileDetail->jk  == 'L' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="P" disabled {{  $profileDetail->jk  == 'P' ? 'selected' : '' }}>
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
                                                        {{  $profileDetail->roles == 'admin' ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="petugas" disabled
                                                        {{  $profileDetail->roles == 'petugas' ? 'selected' : '' }}>
                                                        Petugas
                                                    </option>
                                                    <option value="peminjam" disabled
                                                        {{  $profileDetail->roles == 'peminjam' ? 'selected' : '' }}>
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
                                                    <input type="text" value="{{  $profileDetail->tanggal_lahir  }}"
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
                                                <textarea class="form-control" id="alamat" rows="3" name="alamat" disabled>{{  $profileDetail->alamat  }}</textarea>
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
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/form-element-select.js') }}"></script>

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

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{{ Session::get('error') }}",
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
