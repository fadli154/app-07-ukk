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
                        <h3>Tambah Data Users</h3>
                        <p class="text-subtitle text-muted">Interface untuk menambah data
                            users.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/users">Data Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Users
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
                        <h4 class="card-title card-title-action ms-2 mb-0">Form Tambah Data Users
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" id="name" name="name"
                                                placeholder="ex: Fadli Hifziansyah" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('name')
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="position-relative">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                value="{{ old('username') }}" name="username" placeholder="ex: Pdhlii"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('username')
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="email" class="form-label">Email address</label>
                                        <div class="position-relative">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" id="email" name="email"
                                                placeholder="ex: fadli154@gmail.com" required>
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
                                            <input type="text" value="{{ old('no_telepon') }}"
                                                class="form-control @error('no_telepon') is-invalid @enderror"
                                                id="no_telepon" name="no_telepon" placeholder="ex: 0878-2730-33278"
                                                required>
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
                                        <select class="choices form-select @error('jk') is-invalid @enderror" id="jk"
                                            name="jk" required>
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan
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
                                            id="roles" name="roles" required>
                                            <option value="" selected disabled>Pilih Roles Users</option>
                                            <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="petugas" {{ old('roles') == 'petugas' ? 'selected' : '' }}>
                                                Petugas
                                            </option>
                                            <option value="peminjam" {{ old('roles') == 'peminjam' ? 'selected' : '' }}>
                                                Peminjam
                                            </option>
                                        </select>
                                        <small class="text-danger">
                                            @error('roles')
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <div class="position-relative">
                                            <input type="date" value="{{ old('tanggal_lahir') }}"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" name="tanggal_lahir" placeholder="ex: 0878-2730-33278"
                                                required>
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
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Masukkan Password" name="password" required>
                                            <div class="form-right-icon">
                                                <i class="bi bi-eye"></i>
                                            </div>
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            <small class="text-danger">
                                                @error('password')
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required>{{ old('alamat') }}</textarea>
                                        <small class="text-danger">
                                            @error('alamat')
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div class="form-group">
                                        <label for="foto_user">Foto</label>
                                        <small class="d-block">Note: masukkan foto format PNG, JPG, JPEG, maksimal
                                            5 MB</small>
                                        <input type="file" id="foto-user" name="foto_user"
                                            class="image-preview-filepond">
                                        <small class="text-danger">
                                            @error('foto_user')
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
