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
                        <h3>Data Buku</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat, menambah, mengubah, dan menghapus data
                            buku.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first ">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buku
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header rounded-bottom-5">
                        <div class="row w-100 header-card-buku">
                            <h5 class="card-title col-sm-12 col-md-4 align-self-center">
                                Data Card Buku
                            </h5>
                            <div class="col-sm-12 col-md-8 d-flex justify-content-end pe-0">
                                <form action="{{ route('buku.search') }}" method="get" class="w-75">
                                    <div class="d-flex">
                                        <input type="text"
                                            class="form-control input-search @error('search') is-invalid @enderror"
                                            id="search" value="{{ isset($search) ? $search : '' }}" name="search"
                                            placeholder="ex: Dilan 1990">
                                        <button type="submit" type="button"
                                            class="btn btn-info btn-search text-white me-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Search data buku">
                                            <i class="bi bi-search-heart"></i>
                                        </button>
                                    </div>
                                </form>
                                @can('admin-petugas')
                                    <a href="{{ route('buku.create') }}" type="button" class="btn btn-primary me-2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah data buku">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a href="" type="button" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Data yang dihapus">
                                        <i class="bi bi-recycle"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">
                            @if ($bukuList->count() != 0)
                                @foreach ($bukuList as $buku)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card shadow-sm position-relative card-action" style="max-width: 18rem;">
                                            @if ($buku->koleksi->where('user_id', auth()->user()->user_id)->count() == 0)
                                                <form action="{{ route('koleksi.store') }}" method="post"
                                                    class="form-koleksi">
                                                    @csrf
                                                    <input type="hidden" name="buku_id" value="{{ $buku->buku_id }}">
                                                    <a href="#" class="position-absolute btn-koleksi btn-kolek"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Tambah ke koleksi pribadi">
                                                        <i class="bi bi-bookmark-plus btn-kolek text-warning fs-2"></i>
                                                    </a>
                                                </form>
                                            @else
                                                <form action="{{ route('koleksi.destroy', $buku->slug) }}" method="post"
                                                    class="form-unkolek">
                                                    @csrf
                                                    <a href="#" class="position-absolute btn-koleksi btn-unkolek"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Hapus dari koleksi pribadi">
                                                        <i
                                                            class="bi bi-bookmark-heart-fill btn-unkolek text-warning fs-2"></i>
                                                    </a>
                                                </form>
                                            @endif
                                            <span class="position-absolute count-rating-buku" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Total rating buku">
                                                <span class="text-white">
                                                    <i class="fas fa-star text-warning"></i> 5
                                                </span>
                                            </span>
                                            <a class="sampul_buku" href="{{ route('buku.show', $buku->slug) }}">
                                                @if ($buku->sampul_buku)
                                                    <img src="{{ asset('storage/sampul_buku/' . $buku->sampul_buku) }}"
                                                        class="card-img-top" alt="">
                                                @else
                                                    <img src="{{ asset('assets-UKK/img/no-image.png') }}"
                                                        class="card-img-top" alt="">
                                                @endif
                                                <div class="icon-detail-buku">
                                                    <i class="bi bi-book-fill"></i>
                                                </div>
                                            </a>
                                            <div class="card-body ">
                                                <h6 class="card-title">{{ $buku->judul }} | <span data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Tahun terbit">{{ $buku->tahun_terbit }}</span>
                                                </h6>
                                                <div class="sinopsis">
                                                    <p>
                                                        {!! strip_tags(Str::limit($buku->sinopsis, 70)) !!}
                                                    </p>
                                                </div>
                                                @can('admin-petugas')
                                                    <div class="btn-action-group">
                                                        <a class="btn btn-info btn-detail text-white" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Detail data buku"
                                                            href="{{ route('buku.show', $buku->slug) }}"><i
                                                                class="fas fa-eye ms-2"></i>
                                                        </a>
                                                        <a class="btn btn-warning btn-edit text-white"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="Edit data buku"
                                                            href="{{ route('buku.edit', $buku->slug) }}"><i
                                                                class="bi bi-pen-fill"></i>
                                                        </a>
                                                        <form action="{{ route('buku.destroy', $buku->slug) }}"
                                                            method="post" class="form-destroy">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a class="btn btn-danger btn-destroy text-white btn-destroy"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Hapus data buku" href="#"><i
                                                                    class="fas fa-trash btn-destroy ms-2"></i>
                                                            </a>
                                                        </form>
                                                    </div>
                                                @endcan


                                                <div class="d-flex justify-content-between">
                                                    <small class="kategori-buku text-info align-self-end w-75">
                                                        @foreach ($buku->kategori as $kategori)
                                                            {{ $loop->first ? '' : ($loop->last ? 'dan' : ',') }}
                                                            {{ $kategori->nama_kategori }}
                                                        @endforeach
                                                    </small>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Stok buku">
                                                        <span>{{ $buku->stok_buku }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{ $bukuList->links() }}
                            @else
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets-UKK/img/No data-rafiki.png') }}" class="w-50"
                                        alt="no-data-img">
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/modules/izitoast/js/iziToast.min.js') }}"></script>

    <script>
        document.body.addEventListener('click', function(e) {
            const element = e.target;
            const formKoleksi = document.body.querySelector(".form-koleksi");
            const formUnkolek = document.body.querySelector(".form-unkolek");
            const formDestroy = document.body.querySelector(".form-destroy");


            // console.log(element);

            if (element.classList.contains('btn-kolek')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin mengkoleksi buku ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, koleksi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        element.closest('form').submit();
                    }
                });
            }

            if (element.classList.contains('btn-unkolek')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus dari koleksi anda!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, hapus koleksi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        element.closest('form').submit();
                    }
                });
            }

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data buku ini!",
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
