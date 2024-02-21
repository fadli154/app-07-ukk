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
                        <h3>Data Peminjaman</h3>
                        @can('admin-peminjam')
                        <p class="text-subtitle text-muted">Interface untuk melihat, menambah, mengubah, dan menghapus data
                            peminjaman.</p>
                        @endcan
                        @can('peminjam')
                            <p class="text-subtitle text-muted">Interface untuk melihat data
                            peminjaman anda.</p>
                        @endcan
                        <hr>
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
            <section class="section">
                <div class="card">
                    <div class="card-header rounded-bottom-5">
                        <div class="row w-100">
                            <h5 class="card-title col-sm-12 col-md-6 align-self-center">
                                Data Table Peminjaman
                            </h5>
                            @can('admin-petugas')
                                <div class="col-sm-12 col-md-6 d-flex justify-content-end pe-0">
                                    <a href="{{ route('peminjaman.create') }}" type="button" class="btn btn-primary me-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data peminjaman">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Jumlah Pinjam</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamanList as $peminjaman)
                                    <tr>
                                        <td class="text-capitalize">{{ $peminjaman->user->name }}</td>
                                        <td>{{ $peminjaman->buku->judul }}</td>
                                        <td>{{ $peminjaman->jumlah_pinjam }} buku</td>
                                        <td>
                                            <div class="modal-success me-1 mb-1 d-inline-block">
                                                @if ($peminjaman->status != 'dipinjam')
                                                    <button type="button"
                                                        class="btn btn-outline-warning text-capitalize disabled"
                                                        data-bs-toggle="modal" data-bs-target="#success1">
                                                        {{ $peminjaman->status }}
                                                    </button>
                                                @else
                                                    <!-- Button trigger for Success theme modal -->
                                                    <button type="button" class="btn btn-outline-success text-capitalize"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#success{{ $peminjaman->pemijaman_id }}">
                                                        Dipinjam
                                                    </button>
                                                    @can('admin-petugas')
                                                        <!--Success theme Modal -->
                                                        <div class="modal fade text-left"
                                                            id="success{{ $peminjaman->pemijaman_id }}" tabindex="-1"
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
                                                                    <form
                                                                        action="{{ route('peminjaman.edit.status', $peminjaman->slug) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="status1">Status
                                                                                        Peminjaman</label>
                                                                                    <select
                                                                                        class="choices form-select @error('status') is-invalid @enderror"
                                                                                        id="status1" name="status" required>
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
                                                                                data-bs-dismiss="modal" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Close modal">
                                                                                <i class="bi bi-x-circle me-1"></i> Close
                                                                            </button>

                                                                            <button type="submit"
                                                                                class="btn btn-light-success "
                                                                                data-bs-dismiss="modal" data-bs-toggle="tooltip"
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
                                                    @endcan
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-1">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                        id="dropdownMenuButtonIcon" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bi bi-wrench-adjustable me-2"></i> Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                        <a class="dropdown-item text-info"
                                                            href="{{ route('peminjaman.show', $peminjaman->slug) }}"><i
                                                                class="fas fa-eye me-2"></i>
                                                            Detail</a>
                                                        @can('admin-petugas')
                                                            <a class="dropdown-item text-warning"
                                                                href="{{ route('peminjaman.edit', $peminjaman->slug) }}"><i
                                                                    class="bi bi-pen-fill me-2"></i>
                                                                Edit</a>
                                                            <form
                                                                action="{{ route('peminjaman.destroy', $peminjaman->slug) }}"
                                                                method="post" class="form-destroy">
                                                                @method('DELETE')
                                                                @csrf
                                                                <a class="dropdown-item text-danger btn-destroy"
                                                                    href="#"><i
                                                                        class="fas fa-trash me-2 btn-destroy"></i>
                                                                    Hapus</a>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/assets-mazer/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>
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
                    text: "Ingin menghapus data peminjaman ini!",
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
