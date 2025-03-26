<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partials/head.php'); ?>

<body class="index-page">

    <?php $this->load->view('partials/navbar.php'); ?>

    <main class="main">

        <!-- Call To Action 2 Section -->
        <section id="call-to-action-2" class="call-to-action-2 section dark-background" style="padding: 146px 0px 80px 0px">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Detail Berita</h3>
                            <p><?= $breadcrumb1 .' / '. $breadcrumb2 . ' / ' . $news->title?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action 2 Section -->

        <!-- News -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="<?= base_url('upload/news/'.$news->image) ?>" alt="Hero Image" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row align-items-start mt-3">
                    <div class="col-lg-12">
                        <h2><?= $news->title ?></h2>
                        <span style="color: darkgrey; margin-bottom: 50px!important;">Diposting pada <?= $news->post_date ?></span>
                        <p><?= $news->content ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End News -->

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