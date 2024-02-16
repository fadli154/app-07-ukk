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
                        <h3>Edit Data Users</h3>
                        <p class="text-subtitle text-muted">Interface untuk edit data users.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/users">Data Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Users</li>
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
                                        <img src="{{ asset('assets-UKK/img/no-foto-woman.png') }}" alt="Avatar">
                                    </div>
                                    <h3 class="mt-3"></h3>
                                    <p class="text-small">Fadli Hifziansyah | Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <a href="{{ url()->previous() }}" class="position-absolute" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Kembali"><i class="bi bi-arrow-left-circle"></i></a>
                                    <h4 class="card-title card-title-action ms-4 mb-1">Form Edit Data Users
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @method('')
                                    @csrf
                                    <input type="text" name="user_id" id="" value="" hidden>
                                    <input type="text" name="password" id="" value="" hidden>
                                    <input type="text" name="old_foto" id="" value="" hidden>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <div class="position-relative">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="" id="name" name="name"
                                                        placeholder="ex: fadli154@gmail.com" required>
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
                                                <label for="username" class="form-label">Username</label>
                                                <div class="position-relative">
                                                    <input type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        value="" id="username" name="username"
                                                        placeholder="ex: fadli154@gmail.com" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="email" class="form-label">Email address</label>
                                                <div class="position-relative">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="" id="email" name="email"
                                                        placeholder="ex: fadli154@gmail.com" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope-at"></i>
                                                    </div>
                                                    <small class="text-danger">
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
                                                        id="no_telepon" name="no_telepon"
                                                        placeholder="ex: 0878-2730-33278" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-telephone-fill"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="choices form-select @error('jk') is-invalid @enderror"
                                                    id="jk" name="jk" required>
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                <small class="text-danger">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="roles">Roles Users</label>
                                                <select class="choices form-select @error('roles') is-invalid @enderror"
                                                    id="roles" name="roles" required>
                                                    <option value="" selected disabled>Pilih Roles Users</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                    <option value="peminjam">Peminjam</option>
                                                </select>
                                                <small class="text-danger">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <div class="position-relative">
                                                    <input type="date" value=""
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        id="tanggal_lahir" name="tanggal_lahir"
                                                        placeholder="ex: 0878-2730-33278" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-check"></i>
                                                    </div>
                                                    <small class="text-danger">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="status_aktif">Status Aktif</label>
                                                <select
                                                    class="choices form-select @error('status_aktif') is-invalid @enderror"
                                                    id="status_aktif" name="status_aktif" required>
                                                    <option value="" selected disabled>Pilih Status Aktif</option>
                                                    <option value="Y">Aktif</option>
                                                    <option value="N">Tidak Aktif</option>
                                                </select>
                                                <small class="text-danger">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                                <small class="text-danger">
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="foto_user">Foto</label>
                                                <small class="d-block">Note: masukkan foto format PNG, JPG, JPEG, maksimal
                                                    5 MB</small>
                                                <input type="file" id="foto_user" name="foto_user"
                                                    class="image-preview-filepond" accept="jpg,jpeg,png,svg">
                                                <small class="text-danger">
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
                                    <button type="submit" class="btn btn-primary btn-login"><i
                                            class="fas fa-check me-1"></i>
                                        <span>Simpan</span></button>
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
