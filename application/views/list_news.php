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
                            <h3>Berita</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Call To Action 2 Section -->

        <!-- News -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <?php foreach ($list as $news_item): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="<?= base_url('upload/news/'.$news_item->image) ?>" class="card-img-top" alt="<?= $news_item->title ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $news_item->title ?></h5>
                                    <p class="card-text"><?= substr($news_item->content, 0, 100) ?>...</p>
                                    <a href="<?= site_url('news/detail/'.$news_item->id) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- End News -->


    </main>

    <?php $this->load->view('partials/footer'); ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('partials/js'); ?>
</body>

</html>