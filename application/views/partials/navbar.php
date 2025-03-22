<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">

            <img src="<?= base_url('assets/frontend/img/') ?>images.jpg" alt="">

        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#features">Profile</a></li>
                <li><a href="#gallery">
                        Galeri
                    </a></li>
                <li><a href="#pricing">PBDB</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="<?= site_url('login') ?>">Login</a>

    </div>
</header>