@extends('pages.layout.layout-landing-page')

@section('css')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/style.css') }}">

    {{-- css responsive --}}
    <link rel="stylesheet" href="{{ asset('assets-UKK/css/responsive.css') }}">

    {{-- library --}}
    <link rel="stylesheet" href="{{ asset('assets-UKK/modules/OwlCarousel2/dist/assets/owl.carousel.min.css') }}">
@endsection

@section('content')
    <div class="nav-hero-bg" data-scroll-index="0">
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets-UKK/img/logo-diglib-bulat-huruf.png') }}" alt="Logo"
                        class="d-inline-block align-text-top me-5 ">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#" data-scroll-nav="0">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan" data-scroll-nav="1">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fitur" data-scroll-nav="2">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak" data-scroll-nav="3">Kontak</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-end btn-navbar">
                        <a href="/register">
                            <button class="button-primary">Daftar</button>
                        </a>
                        @guest
                            <a href="/login">
                                <button class="button-secondary"><span>Masuk</span></button>
                            </a>
                        @endguest
                        @auth
                            <a href="/dashboard-{{ auth()->user()->roles }}">
                                <button class="button-secondary"><span>Dashboard</span></button>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        {{-- End Navbar --}}
        {{-- hero --}}
        <section id="hero">
            <div class="container h-100 position-relative">
                <div class="row h-100">
                    <div class="col-md-6 col-sm-12 hero-text my-auto ">
                        <h1 class="judul-hero-text">Membantu Melihat <br> Kesediaan Buku.</h1>
                        <p class="paragraf-hero-text"><b>DigLib </b>hadir untuk temukan buku yang anda inginkan
                            tersedia atau kehabisan sehingga bisa dipinjam.</p>

                        <div class="button-hero-wrapper">
                            @guest
                                <a href="/login">
                                    <button class="button-hero p-3"><i class="fas fa-book-reader me-2"></i>
                                        <span>Temukan
                                            Buku</span></button>
                                    <img src="{{ asset('assets-UKK/img/arrow-btn-hero.png') }}" class="ms-4 arrow-hero"
                                        alt="arrow-btn">
                                </a>
                            @endguest
                            @auth
                                <a href="/dashboard-{{ auth()->user()->roles }}">
                                    <button class="button-hero p-3"><i class="bi bi-grid-fill me-2"></i>
                                        <span>Dashboard
                                        </span></button>
                                    <img src="{{ asset('assets-UKK/img/arrow-btn-hero.png') }}" class="ms-4 arrow-hero"
                                        alt="arrow-btn">
                                </a>
                            @endauth
                        </div>
                    </div>
                    <div class="col my-auto d-flex justify-content-end">
                        <img src="{{ asset('assets-UKK/img/hero-image-bintik.png') }}" alt="hero-img"
                            class="img-fluid img-hero-1">
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets-UKK/img/vektor-bintik.png') }}" alt="accent"
                class="img-fluid img-hero-2 position-absolute start-0 top-0">
        </section>
        {{-- end hero --}}
    </div>

    {{-- layanan --}}
    <section id="layanan" data-scroll-index="1">
        <div class="container h-100">
            <div class="title-section text-center">
                <h2><span class="title-section-yellow">Layanan</span> kami</h2>
                <p>DigLib hadir menjadi solusi bagi kamu</p>
            </div>

            <div class="layanan-wrapper row">
                <div class="col-md-4 layanan-card-wrapper">
                    <div class="layanan-card">
                        <div class="img-layanan">
                            <img src="{{ asset('assets-UKK/img/layanan-stok.png') }}" alt="gambar-layanan-stock">
                        </div>
                        <h3>Lihat Stok</h3>
                        <p>DigLib hadir untuk melihat
                            stok atau kesediaan
                            buku diperpustakaan</p>
                    </div>
                </div>
                <div class="col-md-4 layanan-card-wrapper">
                    <div class="layanan-card">
                        <div class="img-layanan">
                            <img src="{{ asset('assets-UKK/img/layanan-pinjam.png') }}" alt="gambar-layanan-stock">
                        </div>
                        <h3>Pinjam Buku</h3>
                        <p>DigLib hadir untuk sebagai
                            aplikasi pendataan
                            peminjaman buku</p>
                    </div>
                </div>
                <div class="col-md-4 layanan-card-wrapper">
                    <div class="layanan-card">
                        <div class="img-layanan">
                            <img src="{{ asset('assets-UKK/img/layanan-koleksi.png') }}" alt="gambar-layanan-stock">
                        </div>
                        <h3>Lihat Favorit</h3>
                        <p>DigLib hadir untuk
                            menyimpan data buku
                            favorit kamu </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end layanan --}}

    {{-- Fitur --}}
    <section id="fitur" data-scroll-index="2">
        <div class="container h-100">
            <div class="title-section dark text-center">
                <h2><span class="title-section-yellow">Fitur</span> Aplikasi</h2>
                <p>DigLib hadir menjadi solusi bagi kamu</p>
            </div>

            <div class="row d-flex owl-theme owl-loaded">
                <div class="owl-carousel fitur-carousel">
                    <div class="fitur-item">
                        <div class="icon" style="--i: #362b82; --j: #7264d7;"><img
                                src="{{ asset('assets-UKK/img/fitur-icon-chart.png') }}" alt="icon-img" />
                        </div>
                        <h3 class="text-white">Chart</h3>
                        <p>Melalui fitur statistik chart, kami memberikan insight yang jelas dan visualisasi yang
                            memudahkan untuk melihat tren dan pola dalam koleksi buku kami.</p>
                    </div>
                    <div class="fitur-item">
                        <div class="icon" style="--i: rgba(7, 55, 150, 1); --j: rgba(0, 198, 255, 1);"><img
                                src="{{ asset('assets-UKK/img/fitur-icon-search.png') }}" alt="mudah-img" />
                        </div>
                        <h3 class="text-white">Search Books</h3>
                        <p>Dengan fitur pencarian buku, kami memberikan Anda kemampuan untuk dengan cepat menemukan buku
                            yang Anda cari dalam koleksi perpustakaan kami.</p>
                    </div>
                    <div class="fitur-item">
                        <div class="icon" style="--i: rgb(81, 7, 150); --j: rgb(204, 0, 255);"><img
                                src="{{ asset('assets-UKK/img/fitur-icon-koleksi.png') }}" alt="mudah-img" /></div>
                        <h3 class="text-white">Books Collection</h3>
                        <p>Dengan fitur Koleksi Buku, kami memberikan kemampuan kepada pengguna untuk menyimpan buku-buku
                            favorit mereka dan daftar buku yang ingin mereka baca.</p>
                    </div>
                    <div class="fitur-item">
                        <div class="icon" style="--i: rgb(9, 7, 150); --j: rgb(47, 0, 255);"><img
                                src="{{ asset('assets-UKK/img/fitur-icon-ulasan.png') }}" alt="mudah-img" /></div>
                        <h3 class="text-white">Review Books</h3>
                        <p>Dengan fitur Mengulas, memberikan pengguna kesempatan berbagi pandangan mereka
                            mengenai buku-buku yang telah mereka baca.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end Fitur --}}

    {{-- kontak --}}
    <section id="kontak" data-scroll-index="3">
        <div class="container h-100">
            <div class="title-section dark text-center">
                <h2 class="title-kontak"><span class="title-section-yellow">Kontak</span> kami</h2>
            </div>

            <div class="row">
                <div class="col-md-6 my-auto">
                    <h3 class="tag-line-kontak">Butuh Konsultasi..?
                        Silahkan kontak kami
                        Kami Siap Membantu</h3>
                    <h4 class="text-white">Kontak</h4>
                    <ul class="list-kontak">
                        <li>
                            <div class="icon-kontak-wrapper d-inline-block">
                                <img src="{{ asset('assets-UKK/img/vector-alamat.png') }}" alt="">
                            </div>
                            <span>
                                Jl. Veteran No.1A, RT.005/RW.002, Babakan, Kec. Tangerang
                            </span>
                        </li>
                        <li>
                            <div class="icon-kontak-wrapper d-inline-block">
                                <img src="{{ asset('assets-UKK/img/vector-telpon.png') }}" alt="">
                            </div>
                            <span>
                                081234567890
                            </span>
                        </li>
                        <li>
                            <div class="icon-kontak-wrapper d-inline-block">
                                <img src="{{ asset('assets-UKK/img/vector-email.png') }}" alt="">
                            </div>
                            <span>
                                DigLig@gmail.com
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5768925963066!2d106.63556391455468!3d-6.187333395520691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f929162547c7%3A0xbbf35137362e584d!2sSMK%20Negeri%204%20Kota%20Tangerang!5e0!3m2!1sid!2sid!4v1677921080826!5m2!1sid!2sid"
                        width="100%" height="400" style="border: 0; border-radius: 10px; border:2px solid #facc15;"
                        aria-label="Google Maps" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    {{-- end kontak --}}

    <!-- Footer Start -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-col">
                        <h5 class="text-center footer-title">Dikelolah Oleh</h5>
                        <div class="school-logo d-flex my-auto">
                            <img src="{{ asset('assets-UKK/img/logo-sekolah.png') }}" alt="Logo Sekolah" />
                            <div class="text-school-logo">
                                <span>SMK Negeri 4</span>
                                <span class="d-block">Tangerang</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-col footer-col-socmed">
                        <h5 class="text-center social-pages footer-title">Social Pages</h5>
                        <ul class="socmed-footer mt-5" data-aos="zoom-in" data-aos-duration="1800">
                            <a>
                                <li class="li-icon">
                                    <a href="https://www.facebook.com/smkn4tangerang/" target="_blank"
                                        class="btn btn-socmed-footer" style="--i: #074fa1; --j: #1b71d3;"
                                        type="button"><i class="fab fa-facebook icon-btn-socmed-footer ms-2"
                                            aria-label="Facebook"></i></a>
                                </li>
                            </a>
                            <a>
                                <li class="li-icon mx-4">
                                    <a class="btn btn-socmed-footer" href="https://twitter.com/smkn4tangerang"
                                        target="_blank" style="--i: #373738; --j: #787879;" type="button"><i
                                            class="fab fa-twitter icon-btn-socmed-footer ms-2"
                                            aria-label="Twitter"></i></a>
                                </li>
                            </a>
                            <a>
                                <li class="li-icon">
                                    <a href="https://www.instagram.com/smkn4kotatangerang/" target="_blank"
                                        class="btn btn-socmed-footer" style="--i: #dd2a7b; --j: #8134af;"
                                        type="button"><i class="fab fa-instagram icon-btn-socmed-footer ms-2"
                                            aria-label="Instagram"></i></a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="footer-col">
                        <h5 class="footer-aplikasi footer-title">Aplikasi</h5>
                        <h5 class="mt-5">
                            <img src="{{ asset('assets-UKK/img/logo-diglib-bulat-huruf-footer.png') }}"
                                class="logo-aplikasi-footer " alt="">
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="copyright-text">Copyright &copy; 2023 Diglib. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
@endsection

@section('script')
    <script src="{{ asset('assets-UKK/js/landing-page.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('assets-UKK/modules/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>

    <script>
        $(function() {
            $.scrollIt({
                scrollTime: 100,
            });
        });

        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                center: true,
                margin: 0,
                autoplay: true,
                nav: true,
                navText: ['<i class="fas fa-chevron-left text-white"></i>',
                    '<i class="fas fa-chevron-right text-white"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                    },
                },
            })
        });
    </script>
@endsection
