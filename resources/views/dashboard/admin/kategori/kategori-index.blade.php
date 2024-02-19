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
                        <h3>Data Kategori</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat, menambah, mengubah, dan menghapus data
                            kategori.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card overflow-hidden">
                    <div class="card-header rounded-bottom-5">
                        <div class="row w-100">
                            <h5 class="card-title col-sm-12 col-md-6 align-self-center">
                                Data Table Kategori
                            </h5>
                            @can('admin-petugas')
                                <div class="col-sm-12 col-md-6 d-flex justify-content-end pe-0">
                                    <a href="{{ route('kategori.create') }}" type="button" class="btn btn-primary me-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data kategori">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a href="{{ route('kategori.trash') }}" type="button" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Data yang dihapus">
                                        <i class="bi bi-recycle"></i>
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
                                    <th>Nama Kategori</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoriList as $kategori)
                                    <tr>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        @foreach ($usersList as $users)
                                            @if ($users->user_id == $kategori->created_by)
                                                <td>{{ $users->name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($usersList as $users)
                                            @if ($users->user_id == $kategori->updated_by)
                                                <td>{{ $users->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div class="btn-group mb-1">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                        id="dropdownMenuButtonIcon" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bi bi-wrench-adjustable me-2"></i> Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                        <a class="dropdown-item text-info" href="{{ route('kategori.show', $kategori->slug) }}"><i
                                                                class="fas fa-eye me-2"></i>
                                                            Detail</a>
                                                        @can('admin-petugas')
                                                            <a class="dropdown-item text-warning" href="{{ route('kategori.edit', $kategori->slug) }}"><i
                                                                    class="bi bi-pen-fill me-2"></i>
                                                                Edit</a>
                                                            <form action="{{ route('kategori.destroy', $kategori->slug) }}" method="post" class="form-destroy">
                                                                @method('DELETE')
                                                                @csrf
                                                                <a class="dropdown-item text-danger btn-destroy"
                                                                    href="#"><i class="fas fa-trash me-2 btn-destroy"></i>
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

    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formDestroy = document.body.querySelector(".form-destroy");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data kategori ini!",
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
