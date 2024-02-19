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
                        <h3>Data Trashed Users</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat dan mengembalikan (restore) data users
                            yang
                            sudah dihapus.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/users">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users Trash
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header rounded-bottom-5 d-flex">
                        <a href="/users" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali"><i
                                class="bi bi-arrow-left-circle"></i></a>
                        <h4 class="card-title card-title-action ms-2 mb-0">
                            Data Table Trashed Users
                        </h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
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
                                @foreach ($usersList as $users)
                                    <tr>
                                        <td>
                                            @if ($users->foto_user)
                                                <img src="{{ asset('storage/foto_user/' . $users->foto_user) }}"
                                                    class="img-user-table" alt="foto-man">
                                            @else
                                                <img src="{{ asset('assets-UKK/img/no-foto-man.png') }}"
                                                    class="img-user-table" alt="foto-man">
                                            @endif
                                        </td>
                                        <td class="text-capitalize">{{ $users->name }}</td>

                                        <td>
                                            @if ($users->status_aktif == 'Y')
                                                <span class="p-2 badge bg-success" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="User active"><i
                                                        class="bi bi-patch-check "></i>
                                                </span>
                                            @else
                                                <span class="p-2 badge bg-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="User tidak active"><i
                                                        class="bi bi-patch-exclamation "></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($users->roles == 'admin')
                                                <span class="badge bg-warning"><i class="fas fa-user-tie me-1 p-1"></i>
                                                    Admin</span>
                                            @elseif ($users->roles == 'petugas')
                                                <span class="badge bg-info"><i class="fas fa-user-shield me-1 p-1"></i>
                                                    Petugas</span>
                                            @else
                                                <span class="badge bg-secondary"><i class="fas fa-user me-1 p-1"></i>
                                                    Peminjam</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-destroy text-white btn-destroy"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Restore data user"
                                                href="{{ route('users.restore', $users->slug) }}"><i class="bi bi-arrow-counterclockwise "></i>
                                            </a>
                                            <form action="{{ route('users.delete.permanent', $users->slug) }}" method="post" class="form-destroy d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-sm btn-danger btn-destroy text-white btn-destroy"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Hapus permanen data user" href="#"><i
                                                        class="fas fa-trash btn-destroy "></i>
                                                </a>
                                            </form>
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

    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus permanen data user ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, hapus permanen!",
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
