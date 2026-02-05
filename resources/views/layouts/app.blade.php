<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Rekam Inap')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/assets/assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/lindy-uikit.css') }}" />
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-2 start ========================= -->
    <section id="home" class="hero-section-wrapper-2">

        <!-- ========================= header-2 start ========================= -->
        <header class="header header-2">
            <div class="navbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand fw-bold" href="/" style="font-size: 22px;">
                                    Rekam Inap
                                </a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                                    <ul id="nav2" class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="#home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#fitur">Fitur</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#tentang">Tentang</a>
                                        </li>
                                    </ul>
                                    @auth
                                        <a href="/dashboard" class="button button-sm radius-10 d-none d-lg-flex" style="background-color: #666; margin-right: 10px;">
                                            Dashboard
                                        </a>
                                        <a href="/logout" class="button button-sm radius-10 d-none d-lg-flex" style="background-color: #dc3545;">
                                            Logout
                                        </a>
                                    @else
                                        <a href="/login" class="button button-sm radius-10 d-none d-lg-flex">Login
                                        </a>
                                    @endauth
                                </div>
                                <!-- navbar collapse -->
                            </nav>
                            <!-- navbar -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- navbar area -->
        </header>
        <!-- ========================= header-2 end ========================= -->

        <!-- ========================= hero-2 start ========================= -->
        <div class="hero-section hero-style-2">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="hero-content-wrapper">
                            <h4 class="wow fadeInUp" data-wow-delay=".2s">Selamat Datang</h4>
                            <h2 class="mb-30 wow fadeInUp" data-wow-delay=".4s">Sistem Pendukung Keputusan Penginapan</h2>
                            <p class="mb-50 wow fadeInUp" data-wow-delay=".6s">Temukan jenis penginapan terbaik sesuai kebutuhan Anda di Kecamatan Katu Aro, Kabupaten Kerinci menggunakan metode PROMETHEE berbasis web.</p>
                            <div class="buttons">
                                @auth
                                    <a href="/penginapan"
                                        class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".7s">Lihat Data Penginapan
                                    </a>
                                @else
                                    <a href="/login"
                                        class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".7s">Mulai Sekarang
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="{{ asset('Frontend/assets/img/hero/hero-2/hero-img.svg') }}" alt=""
                                class="wow fadeInRight" data-wow-delay=".2s">
                            <img src="assets/img/hero/hero-2/paattern.svg" alt="" class="shape shape-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= hero-2 end ========================= -->

    </section>
    <!-- ========================= hero-section-wrapper-2 end ========================= -->

    <!-- ========================= feature style-2 start ========================= -->
    <section id="fitur" class="feature-section feature-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-md-9">
                            <div class="section-title mb-60">
                                <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Fitur Sistem SPK</h3>
                                <p class="wow fadeInUp" data-wow-delay=".4s">Kelola data penginapan, kriteria, penilaian dan dapatkan rekomendasi terbaik menggunakan metode PROMETHEE</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon">
                                    <i class="lni lni-building"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Data Penginapan</h5>
                                    <p>Kelola dan lihat daftar lengkap jenis penginapan yang tersedia di Kecamatan Katu Aro</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                                <div class="icon">
                                    <i class="lni lni-list"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Kriteria Evaluasi</h5>
                                    <p>Tentukan kriteria dan sub-kriteria untuk mengevaluasi kualitas penginapan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon">
                                    <i class="lni lni-check-circle"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Penilaian</h5>
                                    <p>Berikan penilaian untuk setiap penginapan berdasarkan kriteria yang telah ditetapkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon">
                                    <i class="lni lni-bar-chart"></i>
                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Perhitungan PROMETHEE</h5>
                                    <p>Sistem secara otomatis menghitung dan merangking penginapan terbaik menggunakan metode PROMETHEE</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="feature-img wow fadeInLeft" data-wow-delay=".2s">
            <img src="assets/img/feature/feature-2-1.svg" alt="">
        </div>
    </section>
    <!-- ========================= feature style-2 end ========================= -->

    <!-- ========================= about style-3 start ========================= -->
    <section id="tentang" class="about-section about-style-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image wow fadeInLeft" data-wow-delay=".2s">
                        <img src="assets/img/about/about-3/about-img.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-wrapper">
                        <div class="section-title mb-40">
                            <h3 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Tentang Metode PROMETHEE</h3>
                            <p class="wow fadeInUp" data-wow-delay=".4s">PROMETHEE (Preference Ranking Organization Method for Enrichment Evaluation) adalah metode pengambilan keputusan multi-kriteria yang membantu menentukan alternatif terbaik dari beberapa pilihan berdasarkan kriteria yang telah ditetapkan.</p>
                        </div>
                        <div class="counter-up-wrapper mb-40 wow fadeInUp" data-wow-delay=".6s">
                            <div class="single-counter">
                                <h4>Akurat</h4>
                                <h6>Perhitungan Presisi</h6>
                            </div>
                            <div class="single-counter">
                                <h4>Transparan</h4>
                                <h6>Proses Terbuka</h6>
                            </div>
                            <div class="single-counter">
                                <h4>Sistematis</h4>
                                <h6>Berbasis Data</h6>
                            </div>
                        </div>
                        <a href="#fitur" class="button button-lg radius-3 wow fadeInUp" data-wow-delay=".7s">Lihat Fitur Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about style-3 end ========================= -->

    <!-- ========================= footer style-1 start ========================= -->
    <footer class="footer footer-style-1">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                            <h6>Sistem Pendukung Keputusan Penginapan</h6>
                            <p class="desc">Sistem ini dirancang untuk membantu menentukan jenis penginapan terbaik di Kecamatan Katu Aro, Kabupaten Kerinci menggunakan metode PROMETHEE berbasis web.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
                <p>&copy; 2026 Sistem Pendukung Keputusan Penginapan. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- ========================= footer style-1 end ========================= -->

    <!-- ========================= scroll-top start ========================= -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
    <!-- ========================= scroll-top end ========================= -->

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('Frontend/assets/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/count-up.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/main.js') }}"></script>
</body>

</html>
