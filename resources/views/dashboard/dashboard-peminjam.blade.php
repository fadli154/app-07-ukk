@extends('dashboard.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Dashboard Peminjam</h3>
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
                                                <div class="stats-icon red mb-2">
                                                    <i class="fas fa-cart-plus"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold" style="width: 100px">Peminjaman</h6>
                                                <h6 class="font-extrabold mb-0">80</h6>
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
                                                <div class="stats-icon bg-info mb-2">
                                                    <i class="fas fa-comment-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold" style="width: 100px">Ulasan</h6>
                                                <h6 class="font-extrabold mb-0">80</h6>
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
                                                <div class="stats-icon bg-warning mb-2">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold" style="width: 100px">Koleksi</h6>
                                                <h6 class="font-extrabold mb-0">10</h6>
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
                                                <div class="stats-icon bg-success mb-2">
                                                    <i class="fas fa-check-circle   "></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold" style="width: 100px">Status</h6>
                                                <h6 class="font-extrabold mb-0">Active</h6>
                                            </div>
                                        </div>
                                    </div>
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
                                        <h5 class="font-bold">Fadli Hifziansyah</h5>
                                        <h6 class="text-muted mb-0">Pdhli</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistik data peminjaman</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-peminjaman"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data peminjaman anda</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover table-responsive" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Peminjam</th>
                                            <th>Buku</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-capitalize">Fadli Hifziansyah</td>
                                            <td>Dilan 1990</td>
                                            <td>10 buku</td>
                                            <td>
                                                <div class="modal-success me-1 mb-1 d-inline-block">
                                                    <!-- Button trigger for Success theme modal -->
                                                    <button type="button" class="btn btn-outline-success text-capitalize"
                                                        data-bs-toggle="modal" data-bs-target="#success1">
                                                        Dipinjam
                                                    </button>
                                                    <!--Success theme Modal -->
                                                    <div class="modal fade text-left" id="success1" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class="modal-title white" id="myModalLabel110">
                                                                        Mengubah status peminjaman
                                                                        <span class="text-capitalize">
                                                                            Fadli hifziansyah
                                                                        </span>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="" method="post">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="status1">Status
                                                                                    Peminjaman</label>
                                                                                <select
                                                                                    class="choices form-select @error('status') is-invalid @enderror"
                                                                                    id="status1" name="status"
                                                                                    required>
                                                                                    <option value="" selected
                                                                                        disabled>
                                                                                        Pilih
                                                                                        Status Peminjaman</option>
                                                                                    <option value="dikembalikan"
                                                                                        {{ 'status' == 'dikembalikan' ? 'selected' : '' }}>
                                                                                        Dikembalikan
                                                                                    </option>
                                                                                    <option value="terlambat"
                                                                                        {{ 'status' == 'terlambat' ? 'selected' : '' }}>
                                                                                        Terlambat
                                                                                    </option>
                                                                                </select>
                                                                                <small class="text-danger">
                                                                                    @error('status')
                                                                                        {{ $message }}
                                                                                    @enderror
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary "
                                                                            data-bs-dismiss="modal"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Close modal">
                                                                            <i class="bi bi-x-circle me-1"></i>
                                                                            Close
                                                                        </button>

                                                                        <button type="submit"
                                                                            class="btn btn-light-success "
                                                                            data-bs-dismiss="modal"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Simpan data perubahan">
                                                                            <i class="bi bi-check-circle-fill me-1"></i>
                                                                            Simpan
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/simple-datatables.js') }}"></script>

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
