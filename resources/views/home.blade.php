<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--title-->
    <title>PSB SMA Nusantara Plus</title>
    <!--favicon icon-->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-431.min.css') }}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!--animated css-->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!--ytplayer css-->
    <link rel="stylesheet" href="{{ asset('css/jquery.mb.YTPlayer.min.css') }}">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top custom-nav white-bg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logo_hitam.png') }}" alt="logo" class="img-fluid" width="160">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#features">Alur Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#pricing">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#pricing">Biaya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="main">
        <section class="hero-section hero-section-3 ptb-100">
            <div class="circles">
                <div class="point animated-point-1"></div>
                <div class="point animated-point-2"></div>
                <div class="point animated-point-3"></div>
                <div class="point animated-point-4"></div>
                <div class="point animated-point-5"></div>
                <div class="point animated-point-6"></div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-lg-6">
                        <div class="hero-content-left ptb-100">
                            <h1><span>PSB Online</span><br>SMK Telkom Malang</h1>
                            <p class="lead">Untuk calon pendaftar tahun ajaran 2021/2022 bisa mendaftar melalui website ini atau langsung datang ke tempat pendaftaran</p>
                            <p>
                                <a href="{{ route('login') }}" class="btn solid-btn">Daftar Sekarang</a> 
                                <span id="counter" style="margin-left: 20px" class="btn solid-btn bg-light text-dark">GEL 2 DITUTUP!</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="hero-animation-img">
                            <img class="img-fluid d-block m-auto animation-one" src="{{ asset('img/Telemedicine_01.svg') }}" alt="animation image" width="350">
                            <img class="img-fluid d-none d-lg-block animation-two" src="{{ asset('img/hero-animation-01.svg') }}" alt="animation image" width="250">
                            <img class="img-fluid d-none d-lg-block animation-three" src="{{ asset('img/Telemedicine_03.svg') }}" alt="animation image" width="200">
                            <img class="img-fluid d-none d-lg-block animation-four" src="{{ asset('img/hero-animation-03.svg') }}" alt="animation image" width="200">
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('img/hero-bg-shape-2.svg') }}" class="shape-image" alt="shape image">
        </section>
        <section id="features" class="feature-section ptb-100">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7">
                        <div class="feature-contents section-heading">
                            <h2>Alur Pendaftaran <br>
                                <span>bagaimana?</span></h2>
                            <p>Terdapat beberapa step pendaftaran yang harus dipenuhi agar semua rangkaian pendaftaran hingga seleksi berjalan dengan lancar.</p>

                            <div class="feature-content-wrap">
                                <ul class="nav nav-tabs feature-tab" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active h6" href="#tab6-1" data-toggle="tab">
                                            <h4 class="mb-1">1</h4>
                                            Daftar <br> Akun
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link h6" href="#tab6-2" data-toggle="tab">
                                            <h4 class="mb-1">2</h4>
                                            Pilih Gelombang
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link h6" href="#tab6-3" data-toggle="tab">
                                            <h4 class="mb-1">3</h4>
                                            Isi <br> Formulir
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link h6" href="#tab6-4" data-toggle="tab">
                                            <h4 class="mb-1">4</h4>
                                            Unggah Berkas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link h6" href="#tab6-5" data-toggle="tab">
                                            <h4 class="mb-1">5</h4>
                                            Bayar Pendaftaran
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content feature-tab-content">
                                    <div class="tab-pane active" id="tab6-1">
                                        <ul class="list-unstyled">
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Klik tombol "Daftar Sekarang" di atas</p></div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Pilih tab Daftar</p></div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Masukan data awal pendaftaran</p></div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Login menggunakan email dan password ketika daftar</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab6-2">
                                        <p>Silahkan memilih jalur/gelombang yang tersedia. Pastikan tanggal pendaftaran sudah dibuka dan belum ditutup.</p>
                                    </div>
                                    <div class="tab-pane" id="tab6-3">
                                        <ul class="list-unstyled">
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Isi semua data identitas diri dan orang tua, serta data sekolah asal</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab6-4">
                                        <ul class="list-unstyled">
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Unggah surat keterangan sehat dari instansi kesehatan atau dokter</p></div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Unggah foto memakai seragam SMP/bebas rapi. Maksimal berukuran 1 MB</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab6-5">
                                        <ul class="list-unstyled">
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Unggah bukti/struk pembayaran anda</p></div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="badge badge-circle badge-primary mr-3">
                                                            <span class="ti-check"></span>
                                                        </div>
                                                    </div>
                                                    <div><p class="mb-0">Tunggu panitia untuk memverifikasi pembayaran anda maksimal 1 x 24 jam</p></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="download-img">
                            <img src="{{ asset('img/alur.png') }}" alt="download" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="promo-section ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2>Tahapan Seleksi<br><span>apa aja?</span></h2>
                            <p class="lead">
                                Berikut tahapan seleksi yang harus dilalui pada PSB SMA Nusantara Plus tahun 2021/2022
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row equal">
                    <div class="col-md-6 col-lg-6">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">
                            <div class="circle-icon mb-5">
                                <span class="ti-vector text-white"></span>
                            </div>
                            <h5>Tes Akademik</h5>
                            <p>Diambil dari nilai rapor semester 1 s/d 4 dan berkas scan rapor, serta ujian tulis yang dilakukan secara online.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-5 h-100">
                            <div class="circle-icon mb-5">
                                <span class="ti-lock text-white"></span>
                            </div>
                            <h5>Tes Non Akademik</h5>
                            <p>DIambil dari verifikasi berkas surat keterangan sehat dan tidak buta warna, wawancara siswa dan orang tua, serta kesemaptaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="video-promo ptb-100 background-img" style="background: url('{{ asset('img/hero-bg-1.jpg') }}')no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="video-promo-content mt-4 text-center">
                            <a href="https://www.youtube.com/watch?v=Nd6ZjAHZvN4" class="popup-youtube video-play-icon d-inline-block"><span class="ti-control-play"></span></a>
                            <h5 class="mt-4 text-white">Video Cara Pendaftaran</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="pricing" class="package-section ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2>Biaya dan Jadwal</h2>
                            <p class="lead">
                                Berikut rincian biaya masuk dan jadwal kegiatan PSB tahun pelajaran 2021-2022
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md">
                        <div class="card text-center single-pricing-pack">
                            <div class="card-header py-5 border-0 pricing-header">
                                <div class="h1 text-center mb-0">Biaya <span class="price font-weight-bolder">Masuk</span></div>
                                <span class="h6 text-muted">Gelombang 2 Sesi 2</span>
                            </div>
                            <div class="card-body">
                                <p>Biaya pendaftaran sebesar<br><h4>Rp200.000</h4>Transfer ke No.Rek Bank BTN
                                    <h6>9.3509.930.0000.11100 <br>
                                    TS-SMK TELKOM MALANG</h6>
                                </p>
                                <p>Total biaya daftar ulang bagi siswa yang dinyatakan diterima sebesar<br><h5>Rp17.950.000</h5></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md">
                        <div class="card text-center single-pricing-pack">
                            <div class="card-header py-5 border-0 pricing-header">
                                <div class="h1 text-center mb-0">Jadwal <span class="price font-weight-bolder">PSB</span></div>
                                <span class="h6 text-muted">Gelombang 2 Sesi 2</span>
                            </div>
                            <div class="card-body">
                                <h6 class="font-weight-bold">Pendaftaran</b></h6>
                                04 June 2021 - 05 June 2021
                                <h6 class="font-weight-bold">Tes AkademiK</b></h6>
                                08 June 2021
                                <h6 class="font-weight-bold">Tes Non Akademik</b></h6>
                                08 June 2021                            
                                <h6 class="font-weight-bold">Pengumuman Lolos Tes Akademik</b></h6>
                                14 Desember 2020
                                <h6 class="font-weight-bold">Tes Kesemaptaan</b></h6>
                                17 - 18 Desember 2020
                                <h6 class="font-weight-bold">Tes Wawancara Siswa & Orang Tua</b></h6>
                                19 - 20 Desember 2020
                                <h6 class="font-weight-bold">Pengumuman Akhir</b></h6>
                                09 June 2021
                                <h6 class="font-weight-bold">Daftar Ulang</b></h6>
                                10 June 2021 - 12 June 2021
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="shape-img subscribe-wrap">
        <img src="{{ asset('img/footer-top-shape.png') }}" alt="footer shape" class="img-fluid">
    </div>
    <footer class="footer-section">
        <div class="footer-top pt-150 pb-5 background-img-2" style="background: url('{{ asset('img/footer-bg.png') }}')no-repeat center top / cover">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            <img src="{{ asset('img/logo_putih.png') }}" alt="footer logo" class="img-fluid mb-3" width="150">
                            <p>Mengedepankan Budi Pekerti Mulia, Religius, Unggul dalam Kemampuan Berbasis IPTEK, Cerdas Bersikap dan Berwawasan Maju</p>
                            <div class="social-list-wrap">
                                <ul class="social-list list-inline list-unstyled">
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Facebook"><span class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><span class="ti-twitter"></span></a></li>
                                    <li class="list-inline-item"><a href="#" target="_blank" title="Instagram"><span class="ti-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            <h5 class="mb-3 text-white">Tautan Lain</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#">Tentang Kami</a></li>
                                <li class="mb-2"><a href="#features">Alur Pendaftaran</a></li>
                                <li class="mb-2"><a href="#pricing">Biaya</a></li>
                                <li class="mb-2"><a href="#pricing">Jadwal</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                        <div class="footer-nav-wrap text-white">
                            <h5 class="mb-3 text-white">Bantuan</h5>
                            <ul class="list-unstyled support-list">
                                <li class="mb-2 d-flex align-items-center"><span class="ti-mobile mr-2"></span><a href="tel:+622174707222">(021) 747 07222</a></li>
                                <li class="mb-2 d-flex align-items-center"><span class="ti-mobile mr-2"></span><a href="tel:+622174710824">(021) 747 10 824</a></li>
                                <li class="mb-2 d-flex align-items-center"><span class="ti-email mr-2"></span><a href="mailto:smanusantarap@gmail.com"> smanusantarap@gmail.com</a></li>
                                <li class="mb-2 d-flex align-items-center"><span class="ti-world mr-2"></span><a href="https://smanusantaraplus.wordpress.com/" target="_blank">smanusantaraplus.wordpress.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-nav-wrap text-white">
                            <h5 class="mb-3 text-white">Lokasi Kami</h5>
                            <ul class="list-unstyled support-list">
                                <li class="mb-2 d-flex align-items-center">
                                    Jl. Tarumanegara No. 1, Ciputat<br>
                                    Kec. Pisangan 
                                    <br>Tangerang Selatan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom gray-light-bg pt-4 pb-4">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-6 col-lg-5"><p class="copyright-text pb-0 mb-0">
                        Copyrights © 2020 All rights reserved by
                        <a href="#">SMA Nusantara Plus</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--jQuery-->
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
    <!--Popper js-->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!--Bootstrap js-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!--Magnific popup js-->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!--jquery easing js-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <!--jquery ytplayer js-->
    <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!--owl carousel js-->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--countdown js-->
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <!--validator js-->
    <script src="{{ asset('js/validator.min.js') }}"></script>
    <!--custom js-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        var countDownDate = new Date("Jul 14, 2021 23:59:00").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("counter").innerHTML = days + " Hari " + hours + " Jam "
            + minutes + " Menit " + seconds + " Detik ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("counter").innerHTML = "GEL 4 DITUTUP!";
            }
        }, 1000);
    </script>
</body>
</html>