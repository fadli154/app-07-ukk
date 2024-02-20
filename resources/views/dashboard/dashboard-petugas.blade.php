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
                        <h3>Dashboard Petugas</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7  ">
                                                <h6 class="text-muted font-semibold">Peminjam</h6>
                                                <h6 class="font-extrabold mb-0">{{ $getAllCountPeminjam }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fas fa-user-shield"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                                                <h6 class="text-muted font-semibold">Petugas</h6>
                                                <h6 class="font-extrabold mb-0">{{ $getAllCountPetugas }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                                                <h6 class="text-muted font-semibold">Buku</h6>
                                                <h6 class="font-extrabold mb-0">{{ $getAllCountBuku }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="fas fa-cart-plus"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                                                <h6 class="text-muted font-semibold" style="width: 100px">Peminjaman</h6>
                                                <h6 class="font-extrabold mb-0">{{ $getAllCountPeminjaman }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Statistik data peminjaman</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-peminjaman"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header ">
                                        <h4>Ulasan terakhir</h4>
                                    </div>
                                    <div class="card-body position-relative">
                                        @if (count($ulasanList) == 0)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('assets-UKK/img/No data-rafiki.png') }}" class="w-50"
                                                    alt="no-data-img">
                                            </div>
                                        @else
                                            @foreach ($ulasanList as $ulasan)
                                                <div class="ulasan-user mb-4">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-lg avatar-ulasan">
                                                            @if ($ulasan->user->foto_user)
                                                                <img
                                                                    src="{{ asset('storage/foto_user/' . $ulasan->user->foto_user) }}">
                                                            @else
                                                                <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}">
                                                            @endif
                                                        </div>
                                                        <div class="align-self-center text-capitalize mt-2">
                                                            <h6 class="mb-0">{{ $ulasan->user->name }}</h6>
                                                            <p class="mb-0 text-sm text-primary">{{ $ulasan->user->roles }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-block p-4">
                                                        @for ($i = 0; $i < $ulasan->rating; $i++)
                                                            <i class="bi bi-star-fill text-warning"></i>
                                                        @endfor
                                                        <p class="card-text mt-3">
                                                            {!! strip_tags(Str::limit($ulasan->ulasan, 30)) !!}
                                                        </p>
                                                        <div class="wrapper-ulasan-buku my-2">
                                                            @if ($ulasan->foto_ulasan)
                                                                <a href="#">
                                                                    <img src="{{ asset('storage/foto_ulasan/' . $ulasan->foto_ulasan) }}"
                                                                        alt="sampul-buku" class="w-50 rounded-3"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalUlasan{{ $ulasan->slug }}">
                                                                </a>
                                                            @else
                                                                <a href="#">
                                                                    <img src="{{ asset('assets-UKK/img/no-image.png') }}"
                                                                        alt="sampul-buku" class="w-50 rounded-3"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalUlasan{{ $ulasan->slug }}">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <small>
                                                            {{ date('d-M-Y', strtotime($ulasan->created_at)) }}
                                                        </small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    @foreach ($ulasanList as $ulasan)
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalUlasan{{ $ulasan->slug }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    @if ($ulasan->foto_ulasan)
                                                        <img src="{{ asset('storage/foto_ulasan/' . $ulasan->foto_ulasan) }}"
                                                            alt="sampul-buku" class="w-100 rounded-3">
                                                    @else
                                                        <img src="{{ asset('assets-UKK/img/no-image.png') }}"
                                                            alt="sampul-buku" class="w-100 rounded-3">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ auth()->user()->username }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Peminjam</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>User Terbaru</h4>
                            </div>
                            <div class="card-content pb-4">
                                @foreach ($getNewstUser as $user)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            @if ($user->foto_user)
                                                <img src="{{ asset('storage/foto_user/' . $user->foto_user) }}">
                                            @else
                                                <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}">
                                            @endif
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $user->name }}</h5>
                                            <h6 class="text-muted mb-0">{{ $user->roles }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="px-4">
                                    <a href="{{ route('users.index') }}"
                                        class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Data
                                        Users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/dashboard.js') }}"></script>

    {{-- statistik dashboard --}}
    <script>
        const dataBulans = {!! json_encode($dataBulan) !!}
        const getAllCountPeminjaman = {!! json_encode($getAllCountPeminjaman) !!}

        var peminjamanData = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: false,
            },
            chart: {
                type: "bar",
                height: 300,
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {},
            series: [{
                name: "sales",
                data: [getAllCountPeminjaman],
            }, ],
            colors: "#435ebe",
            xaxis: {
                categories: dataBulans,
            },
        };

        var chartPeminjaman = new ApexCharts(
            document.querySelector("#chart-peminjaman"),
            peminjamanData
        );

        chartPeminjaman.render();
    </script>

    <script>
        const getUserFemale = {!! json_encode($getUserFemale) !!}
        const getUserMale = {!! json_encode($getUserMale) !!}

        let optionsVisitorsProfile = {
            series: [getUserMale, getUserFemale],
            labels: ["Male", "Female"],
            colors: ["#435ebe", "#55c6e8"],
            chart: {
                type: "donut",
                width: "100%",
                height: "350px",
            },
            legend: {
                position: "bottom",
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "30%",
                    },
                },
            },
        };

        var chartVisitorsProfile = new ApexCharts(
            document.getElementById("chart-visitors-profile"),
            optionsVisitorsProfile
        );

        chartVisitorsProfile.render();
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
@endsection
