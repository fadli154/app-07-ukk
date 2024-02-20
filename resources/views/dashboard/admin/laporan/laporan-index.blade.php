@extends('dashboard.layout.main')

@section('css')
    <link rel="stylesheet"
        href="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-UKK/assets-mazer/extensions/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Laporan</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat dan membuat data
                            laporan.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan
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
                            <div class="card-body rounded-bottom-5 d-flex justify-content-between">
                                <div class="row">
                                    <h5 class="card-title col-12 mb-5">
                                        Filter Table Laporan
                                    </h5>
                                    <form action="{{ route('laporan.filter') }}" method="post" novalidate >
                                        @csrf
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control flatpickr-range mb-3"
                                                    name="tanggal" placeholder="Select date..">
                                                <small class="text-danger">
                                                    @error('tanggal')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="choices form-select @error('status') is-invalid @enderror"
                                                    id="status" name="status" required>
                                                    <option value="" selected disabled>Pilih Status</option>
                                                    <option value="dipinjam"
                                                        {{ old('status') == 'dipinjam' ? 'selected' : '' }}>
                                                        Dipinjam
                                                    </option>
                                                    <option value="dikembalikan"
                                                        {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>
                                                        Dikembalikan
                                                    </option>
                                                    <option value="terlambat"
                                                        {{ old('status') == 'terlambat' ? 'selected' : '' }}>
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
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-login "
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Filter table laporan"><i class="fas fa-filter me-1"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body rounded-bottom-5 d-flex justify-content-between">
                                <div class="row">
                                    <h5 class="card-title col-12 mb-5">
                                        Export Table Laporan
                                    </h5>
                                    <form action="{{ route('laporan.export') }}" method="post" novalidate>
                                        @csrf
                                        <div class="col-sm-12 mb-1">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control flatpickr-range mb-3"
                                                    name="tanggal" placeholder="Select date..">
                                                <small class="text-danger">
                                                    @error('tanggal')
                                                        {{ $message }}
                                                    @enderror
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="status2">Status</label>
                                                <select class="choices form-select @error('status') is-invalid @enderror"
                                                    id="status2" name="status" required>
                                                    <option value="" selected disabled>Pilih Status</option>
                                                    <option value="dipinjam"
                                                        {{ old('status') == 'dipinjam' ? 'selected' : '' }}>
                                                        Dipinjam
                                                    </option>
                                                    <option value="dikembalikan"
                                                        {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>
                                                        Dikembalikan
                                                    </option>
                                                    <option value="terlambat"
                                                        {{ old('status') == 'terlambat' ? 'selected' : '' }}>
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
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Generate laporan">
                                                <i class="bi bi-filetype-xlsx"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-header rounded-bottom-5 d-flex justify-content-between">
                                <h5 class="card-title">
                                    Data Table Laporan
                                </h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Peminjam</th>
                                            <th>Buku</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Tanggal Pinjam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporanList as $laporan)
                                            <tr {{ $laporan->status == 'dikembalikan' ? 'class=table-success' : 'class=table-danger' }}>
                                                <td class="text-capitalize">{{ $laporan->user->name }}</td>
                                                <td>{{ $laporan->buku->judul }}</td>
                                                <td>{{ $laporan->jumlah_pinjam }} buku</td>
                                                <td>{{ $laporan->tanggal_pinjam }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/date-picker.js') }}"></script>

    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data laporan ini!",
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
@endsection
