@extends('pages.layout.layout-landing-page')

@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/responsive.css') }}">
@endsection

@section('content')
    <section id="register">
        <div class="row">
            <div class="col-md-12 col-img d-flex justify-content-center align-items-center my-1">
                <img src="{{ asset('assets-UKK/img/logo-diglib-kotak.png') }}" alt="logo-diglib">
            </div>
            <div class="col-md-6 col-lg-5 register-wrapper mx-auto position-relative">
                <div class="background"></div>
                <a href="/" class="icon-back">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <div class="head-register">
                    <h4 class="title-register">register</h4>
                    <p class="sub-title">Please create your own account</p>
                </div>
                <div class="body-register">
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row p-0">
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Masukkan nama" required>
                                    </div>
                                    <small class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" value="{{ old('username') }}"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            name="username" placeholder="Masukkan username" required>
                                    </div>
                                    <small class="text-danger">
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="position-relative">
                                        <input type="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Masukkan email" required>
                                    </div>
                                    <small class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="no_telepon">Nomor Telepon</label>
                                    <div class="position-relative">
                                        <input type="text" value="{{ old('no_telepon') }}"
                                            class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon"
                                            name="no_telepon" placeholder="Masukkan nomor telepon" required>
                                    </div>
                                    <small class="text-danger">
                                        @error('no_telepon')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="position-relative">
                                        <input type="date" value="{{ old('tanggal_lahir') }}"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir"
                                            required>
                                    </div>
                                    <small class="text-danger">
                                        @error('tanggal_lahir')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Masukkan password" required
                                            autocomplete="password">
                                        <div class="form-right-icon">
                                            <i class="bi bi-eye"></i>
                                        </div>
                                        <small class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-1">
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="choices form-select" id="jk" name="jk" required>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <small class="text-danger">
                                        @error('jk')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-1">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required>{{ old('alamat') }}</textarea>
                                    <small class="text-danger">
                                        @error('alamat')
                                            {{ $message }}
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
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-register"><i
                                class="fas fa-sign-in-alt me-2"></i>
                            <span>Register</span></button>
                        <small class="d-block text-center mt-3 btn-sub-title">have an account? <a href="/login"
                                class="text-decoration-none ">login</a></small>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/compiled/js/app.js') }}"></script>
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
