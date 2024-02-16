@extends('dashboard.layout.main')

@section('css')
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
                        <h3>Data Users</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat, menambah, mengubah, dan menghapus data
                            users.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header rounded-bottom-5">
                        <div class="row w-100">
                            <h5 class="card-title col-sm-12 col-md-3 align-self-center">
                                Data Table Users
                            </h5>
                            <div class="col-sm-12 col-md-9 d-flex justify-content-end pe-0">
                                <a href="" type="button" class="btn btn-primary me-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Tambah data users">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                                <a href="" type="button" class="btn btn-success" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Data yang dihapus">
                                    <i class="bi bi-recycle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>
                                    <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}" class="img-user-table"
                                        alt="foto-man">
                                </td>
                                <td class="text-capitalize">fadli hifziansyah</td>
                                <td>
                                    <span class="p-2 badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="User active"><i class="bi bi-patch-check "></i>
                                    </span>
                                    <span class="p-2 badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="User tidak active"><i class="bi bi-patch-exclamation "></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-warning"><i class="fas fa-user-tie me-1 p-1"></i>
                                        Admin</span>
                                    <span class="badge bg-info"><i class="fas fa-user-shield me-1 p-1"></i>
                                        Petugas</span>
                                    <span class="badge bg-secondary"><i class="fas fa-user me-1 p-1"></i>
                                        Peminjam</span>
                                </td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="bi bi-wrench-adjustable me-2"></i> Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                <a class="dropdown-item text-info" href=""><i
                                                        class="fas fa-eye me-2"></i>
                                                    Detail</a>
                                                <a class="dropdown-item text-warning" href=""><i
                                                        class="bi bi-pen-fill me-2"></i>
                                                    Edit</a>
                                                <form action="" method="post" class="form-destroy">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="dropdown-item text-danger btn-destroy" href="#"><i
                                                            class="fas fa-trash me-2 btn-destroy"></i>
                                                        Hapus</a>
                                                </form>
                                                <form action="" method="post" class="form-active">
                                                    @method('PUT')
                                                    @csrf
                                                    <a class="dropdown-item text-success btn-active" href="#"><i
                                                            class="fas fa-check-circle me-2 btn-active"></i>
                                                        active</a>
                                                </form>
                                                <form action="" method="post" class="form-unactive">
                                                    @method('PUT')
                                                    @csrf
                                                    <a class="dropdown-item text-danger btn-unactive" href="#"><i
                                                            class="fas fa-times-circle me-2 btn-unactive"></i>
                                                        Non active</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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

    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");
            const formUnactive = document.body.querySelector(".form-unactive");
            const formactive = document.body.querySelector(".form-active");

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

            if (element.classList.contains('btn-unactive')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin non aktifkan user ini!",
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

            if (element.classList.contains('btn-active')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin mengaktifkan data user ini!",
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
