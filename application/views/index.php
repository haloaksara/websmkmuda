<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partials/head.php'); ?>

<body class="index-page">

    <?php $this->load->view('partials/navbar.php'); ?>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">

                            <h1 class="mb-4">
                                Selamat <br>
                                Datang di <br>
                                <span class="accent-text">Website SMKMUDA</span>
                            </h1>

                            <p class="mb-4 mb-md-5">
                                SMK Muhammadiyah 02 Paleran adalah Lembaga pendidikan yang mengedepankan akhlak dan budi
                                pekerti
                                yang luhur. Serta memberikan pendidikan yang berkualitas dan berbasis teknologi.
                            </p>

                            <div class="hero-buttons">
                                <a href="login.php" class="btn btn-primary me-0 me-sm-2 mx-1">Login</a>
                                <a href="https://youtu.be/4RYAyQ0U7Z4?si=bRDK9TG1hZs98BgR"
                                    class="btn btn-link mt-2 mt-sm-0 glightbox">
                                    <i class="bi bi-play-circle me-1"></i>
                                    Play Video
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="<?= base_url('assets/frontend/img/') ?>coba.webp" alt="Hero Image" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <div class="stat-content">
                                <h4>5x Tahfizul Qur'an</h4>
                                <p class="mb-0">Lomba Menghafal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div class="stat-content">
                                <h4>350 Karyawan dan Siswa</h4>
                                <p class="mb-0">Memiliki Guru yang kompeten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div class="stat-content">
                                <h4>1x Pusat Keunggulan</h4>
                                <p class="mb-0">Menjadi Sekolah Pusat Keunggulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <div class="stat-content">
                                <h4>6x Lomba Silat</h4>
                                <p class="mb-0"> Juara Lomba Pencak Silat</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">Tentang SMK Muda</span>
                        <h2 class="about-title">SMK Muhammadiyah 02 Paleran</h2>
                        <p class="about-description">SMK Muhammadiyah 02 Paleran adalah sekolah yang sangat mengesankan
                            dan mengedepankan akhlak dan budi pekerti yang luhur. Oleh karena itu, SMK Muhammadiyah 02
                            Paleran Menjadi SMK yang favorit bagi Kaum Muhammadiyah tersebut.</p>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-5">
                                    <div class="profile d-flex align-items-center gap-3">
                                        <img src="<?= base_url('assets/frontend/img/') ?>gambar3.png" alt="CEO Profile" class="profile-image">
                                        <div>
                                            <h4 class="profile-name">Aguk Fatria Setiyawan</h4>
                                            <p class="profile-position">Kepala Sekolah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Hubungi</p>
                                            <p class="contact-number">+62 8241 3254 5756</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="<?= base_url('assets/frontend/img/') ?>gambar2.jpeg" alt="Business Meeting"
                                    class="img-fluid main-image rounded-4">
                                <img src="<?= base_url('assets/frontend/img/') ?>gambar3.png" alt="Team Discussion"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating">
                                <h3>16+ <span>Years</span></h3>
                                <p>Mendidik Generasi Bangsa</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- /About Section -->

        <!-- Jurusan Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Jurusan</h2>
                <p>SMK Muhammadiyah 02 Paleran Mempunyai 3 Jurusan yaitu Jurusan RPL,TSM & BSD</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="d-flex justify-content-center">

                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <h4>RPL</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <h4>TSM</h4>
                            </a><!-- End tab nav item -->

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <h4>BSD</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Rekayasa Perangkat Lunak</h3>
                                <p class="fst-italic">
                                    Rekayasa Perangkat Lunak adalah Jurusan yang selalu mengedepankan Logika berpikir
                                    dan kreatifitas
                                    Seperti : </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Menemukan Kesalahan dalam sebuah
                                            Aplikasi.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Menentukan langkah-langkah yang akan di
                                            ambil pada kesemptan selanjutnya.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Membuat Aplikasi yang akan berguna untuk
                                            memudahkan pekerjaan di masa depan</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="<?= base_url('assets/frontend/img/') ?>features-illustration-1.webp" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Teknik Sepeda Motor</h3>
                                <p class="fst-italic">
                                    Teknik Sepeda Motor adalah jurusan yang fokus pada keterampilan dan pengetahuan
                                    dalam perawatan, perbaikan, dan modifikasi sepeda motor. Siswa akan belajar tentang
                                    mesin, sistem kelistrikan, dan teknologi terbaru dalam industri otomotif.

                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Pelajari dasar-dasar mesin dan komponen
                                            sepeda motor.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Praktikkan keterampilan perawatan dan
                                            perbaikan secara rutin.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Ikuti perkembangan teknologi terbaru
                                            dalam industri otomotif.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Bergabunglah dengan komunitas atau klub
                                            sepeda motor untuk berbagi pengetahuan dan pengalaman dan Manfaatkan sumber
                                            daya online seperti tutorial video dan forum diskusi. </span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="<?= base_url('assets/frontend/img/') ?>features-illustration-2.webp" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Bisnis Digital</h3>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Pelajari dasar-dasar pemasaran digital
                                            dan e-commerce.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Manfaatkan media sosial untuk
                                            mempromosikan produk atau layanan.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Gunakan analisis data untuk memahami
                                            perilaku konsumen dan mengoptimalkan strategi bisnis.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Pelajari cara membuat dan mengelola toko
                                            online.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Ikuti perkembangan teknologi dan tren
                                            terbaru dalam bisnis digital.</span></li>
                                </ul>
                                <p class="fst-italic">
                                    Bisnis Digital dalam pendidikan adalah program yang mengajarkan siswa tentang cara
                                    memanfaatkan teknologi digital untuk menciptakan, mengelola, dan mengembangkan
                                    bisnis. Siswa akan belajar tentang pemasaran digital, e-commerce, analisis data, dan
                                    strategi bisnis online. Program ini bertujuan untuk membekali siswa dengan
                                    keterampilan yang dibutuhkan untuk sukses di era digital.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="<?= base_url('assets/frontend/img/') ?>features-illustration-3.webp" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                </div>

            </div>

        </section>
        <!-- /Jurusan Section -->

        

        <!-- news section -->
        <section id="news" class="call-to-action section dark-background" style="padding: 0px 0px!important;">
            <div class="container">

                <div class="section-title" data-aos="fade-up" style="padding-bottom: 0px;">
                    <h2 style="padding-bottom: 0px;">Berita Terbaru</h2>
                </div><!-- End Section Title -->
    
                <!-- lakukan pengecekan apakah data lebih dari 3, jika ya maka buat card bisa di slider -->
                <?php if (count($news) >= 3): ?>
                <div class=" swiper">
                    <div class="card-wrapper">
                        <ul class="card-list swiper-wrapper">
                            <?php foreach ($news as $item): ?>
                            <li class="card-item swiper-slide">
                                <a href="#" class="card-link">
                                    <img src="upload/news/<?= $item->image; ?>" class="card-image"
                                        style="height: 200px; object-fit: cover;">
                                    <h2 class="card-title"><?= $item->title; ?></h2>
                                    <p class="card-text"><?= substr($item->content, 0, 100); ?>...</p>
                                    <!-- batasi content hanya 100 karakter -->
                                    <button class="btn btn-primary">Baca Selengkapnya</button>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-slide-button swiper-button-prev"></div>
                        <div class="swiper-slide-button swiper-button-next"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="btn btn-light">Tampilkan Lebih Banyak</a>
                </div>
                <!-- jika data < dari 3 maka buat card biasa yang tidak bisa di slider -->
                <?php else: ?>
                <div class="">
                    <div class="row">
                        <?php foreach ($news as $item): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="upload/news/<?= $item->image; ?>" class="card-img-top"
                                    alt="<?= $item->title; ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item->title; ?></h5>
                                    <p class="card-text"><?= substr($item->content, 0, 100); ?>...</p>
                                    <!-- batasi content hanya 100 karakter -->
                                    <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="shape shape-1">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>

                <div class="shape shape-2">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>

                <!-- Dot Pattern Groups -->
                <div class="dots dots-1">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        </pattern>
                        <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                    </svg>
                </div>

                <div class="dots dots-2">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        </pattern>
                        <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                    </svg>
                </div>

                <div class="shape shape-3">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>
            </div>
        </section>
        <!-- End News -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 40
                                },
                                "480": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 60
                                },
                                "640": {
                                    "slidesPerView": 4,
                                    "spaceBetween": 80
                                },
                                "992": {
                                    "slidesPerView": 6,
                                    "spaceBetween": 120
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="<?= base_url('assets/frontend/') ?>img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Profil Alumni Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Profil Alumni</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="<?= base_url('assets/frontend/') ?>/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="<?= base_url('assets/frontend/') ?>/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="<?= base_url('assets/frontend/') ?>/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <img src="<?= base_url('assets/frontend/') ?>/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>

            </div>
        </section>
        <!-- /Profil Alumni Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row content justify-content-center align-items-center position-relative">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="display-4 mb-4">Pengumuman Kelulusan</h2>
                        <p class="mb-4">Klik tombol dibawah ini untuk melihat pengumuman kelulusan</p>
                        <a href="<?= site_url('login') ?>" class="btn btn-cta">Cek Kelulusan</a>
                    </div>

                    <!-- Abstract Background Elements -->
                    <div class="shape shape-1">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <div class="shape shape-2">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <!-- Dot Pattern Groups -->
                    <div class="dots dots-1">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                        </svg>
                    </div>

                    <div class="dots dots-2">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                        </svg>
                    </div>

                    <div class="shape shape-3">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>
                </div>

            </div>

        </section>
        <!-- /Call To Action Section -->

        

        <!-- Gallery Section -->
        <section id="gallery" class="features section">
            <div class="container text-center py-5  section-title">
                <div class="mx-auto" style="max-width: 700px;">
                    <h2>Galeri Kegiatan</h2>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                    <div class="col">
                        <a class="gallery-item" href="https://picsum.photos/id/251/1200/800.webp">
                            <img src="https://picsum.photos/id/251/480/320.webp" class="img-fluid"
                                alt="Lorem ipsum dolor sit amet">
                        </a>
                    </div>
                    <div class="col">
                        <a class="gallery-item" href="https://picsum.photos/id/678/1200/800.webp">
                            <img src="https://picsum.photos/id/678/480/320.webp" class="img-fluid"
                                alt="Ipsum lorem dolor sit amet">
                        </a>
                    </div>
                    <div class="col">
                        <a class="gallery-item" href="https://picsum.photos/id/74/1200/800.webp">
                            <img src="https://picsum.photos/id/74/480/320.webp" class="img-fluid"
                                alt="Dolor lorem ipsum sit amet">
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="btn btn-primary">Tampilkan Lebih Banyak</a>
                </div>
            </div>
        </section>
        <!-- /Gallery Section -->

        <!-- Call To Action 2 Section -->
        <section id="call-to-action-2" class="call-to-action-2 section dark-background" >
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>PENDAFTARAN MURID BARU</h3>
                            <p>Klik link berikut ini untuk informasi dan ketentuan pendaftaran murid baru</p>
                            <a class="cta-btn" href="#">Formulir Pendaftaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action 2 Section -->

        <!-- Faq Section -->
        <!-- <section class="faq-9 faq section light-background" id="faq">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                        <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper
                            libero sit amet adipiscing sem neque sed ipsum.</p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">

                            <div class="faq-item faq-active">
                                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                                <div class="faq-content">
                                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                        laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                        rhoncus dolor purus non.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                                <div class="faq-content">
                                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                        suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                        convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                                <div class="faq-content">
                                    <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                        in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                        suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                                <div class="faq-content">
                                    <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                        in suscipit sequi. Distinctio ipsam dolore et.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section> -->
        <!-- /Faq Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3>Informasi Kontak</h3>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Alamat</h4>
                                    <p>Jl. Raya Gambirono No.2, Krajan Kulon, Paleran, Kec. Umbulsari, Kabupaten Jember, Jawa Timur 68154</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="content">
                                    <h4>Telepon</h4>
                                    <p>+62 812-3461-9510</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>Email</h4>
                                    <p>contact@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                            <h3>Denah</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.8780432871176!2d113.49849567579061!3d-8.21501809181739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68eeb1412f473%3A0x4ed2829f92d46f13!2sSMK%20Muhammadiyah%202%20Umbulsari%20Jember!5e0!3m2!1sid!2sbd!4v1742574005650!5m2!1sid!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- /Contact Section -->

    </main>

    <?php $this->load->view('partials/footer'); ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('partials/js'); ?>
</body>

</html>