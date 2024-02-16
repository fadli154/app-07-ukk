@extends('pages.layout.layout-landing-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/responsive.css') }}">
@endsection

@section('content')
    <section id="login">
        <div class="row">
            <div class="col-md-12 col-img d-flex justify-content-center align-items-center my-1">
                <img src="{{ asset('assets-UKK/img/logo-diglib-kotak.png') }}" alt="logo-diglib">
            </div>
            <div class="col-md-5 col-lg-4 login-wrapper mx-auto position-relative">
                <div class="background"></div>
                <a href="/" class="icon-back">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <div class="head-login">
                    <h4 class="title-login">login</h4>
                    <p class="sub-title">Please enter your credentials</p>
                </div>
                <div class="body-login">
                    <form action="/login-action" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="email" class="form-label">Email address</label>
                                <div class="position-relative">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Masukkan email">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope-at"></i>
                                    </div>
                                    <small class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Masukkan Password" name="password">
                                    <div class="form-right-icon">
                                        <i class="bi bi-eye"></i>
                                    </div>
                                    <div class="form-control-icon">
                                        <i class="bi bi-lock"></i>
                                    </div>
                                    <small class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login"><i class="fas fa-sign-in-alt me-2"></i>
                            <span>Login</span></button>
                        <small class="d-block text-center mt-3 btn-sub-title">Don`t have an account? <a href="/register"
                                class="text-decoration-none ">register</a></small>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/assets-mazer/compiled/js/app.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>

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
