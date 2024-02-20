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
                        <h3>Data Koleksi</h3>
                        <p class="text-subtitle text-muted">Interface untuk melihat, menambah, mengubah, dan menghapus data
                            koleksi.</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first ">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Koleksi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header rounded-bottom-5">
                        <div class="row w-100 header-card-koleksi">
                            <h5 class="card-title col-sm-12 col-md-4 align-self-center">
                                Data Card Koleksi
                            </h5>
                            <div class="col-sm-12 col-md-8 d-flex justify-content-end pe-0">
                                <form action="{{ route('koleksi.search') }}" method="get" class="w-75">
                                    @csrf
                                    <div class="d-flex">
                                        <input type="text"
                                            class="form-control input-search @error('search') is-invalid @enderror"
                                            id="search" value="" name="search" placeholder="ex: Dilan 1990">
                                        <button type="submit" type="button"
                                            class="btn btn-info btn-search text-white me-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Search data koleksi">
                                            <i class="bi bi-search-heart"></i>
                                        </button>
                                    </div>
                                </form>
                                <a href="{{ route('buku.index') }}" type="button" class="btn btn-primary me-2" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Tambah koleksi">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">
                            @if ($koleksiList->count() != 0)
                                @foreach ($koleksiList as $koleksi)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card shadow-sm position-relative card-action" style="max-width: 18rem;">
                                            <span class="position-absolute count-rating-buku" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Total rating buku">
                                                <span class="text-white">
                                                    <i class="fas fa-star text-warning"></i> 5
                                                </span>
                                            </span>
                                            <a class="sampul_buku" href="{{ route('buku.show', $koleksi->buku->slug) }}">
                                                @if ($koleksi->buku->sampul_buku)
                                                    <img src="{{ asset('storage/sampul_buku/' . $koleksi->buku->sampul_buku) }}"
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
                                                <h6 class="card-title">{{ $koleksi->buku->judul }} | <span
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Tahun terbit">{{ $koleksi->buku->tahun_terbit }}</span>
                                                </h6>
                                                <div class="sinopsis">
                                                    <p>
                                                        {!! strip_tags(Str::limit($koleksi->buku->sinopsis, 70)) !!}
                                                    </p>
                                                </div>
                                                <div class="btn-action-group">
                                                    <a class="btn btn-info btn-detail text-white" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Detail data koleksi"
                                                        href=""><i class="fas fa-eye ms-2"></i>
                                                    </a>
                                                    <form action="{{ route('koleksi.destroy', $koleksi->slug) }}" method="post" class="form-destroy">
                                                        @csrf
                                                        <a class="btn btn-danger btn-destroy text-white btn-destroy"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Hapus dari koleksi" href="#"><i
                                                                class="bi bi-bookmark-x btn-destroy ms-2"></i>
                                                        </a>
                                                    </form>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <small class="kategori-koleksi text-info align-self-end w-75">
                                                        @foreach ($koleksi->buku->kategori as $kategori)
                                                            {{ $loop->first ? '' : ($loop->last ? 'dan' : ',') }}
                                                            {{ $kategori->nama_kategori }}
                                                        @endforeach
                                                    </small>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Stok koleksi">
                                                        <span>{{ $koleksi->buku->stok_buku }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{ $koleksiList->links() }}
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
            const formDestroy = document.body.querySelector(".form-destroy");

            // console.log(element);

            if (element.classList.contains('btn-destroy')) {
                Swal2.fire({
                    title: "Apa anda yakin?",
                    text: "Ingin menghapus data koleksi ini!",
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
