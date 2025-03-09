<div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="<?= site_url('/') ?>" style="height: 65px;">
                    <h6 class="text-dark m-0 h1 text-uppercase">Toko Online</h6>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= site_url('/') ?>" class="nav-item nav-link active">Home</a>
                            <a href="<?= site_url('v/produk') ?>" class="nav-item nav-link">Product</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="<?= site_url('cart') ?>" class="dropdown-item">Shopping Cart</a>
                                    <a href="<?= site_url('checkout') ?>" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                            <a href="<?= site_url('order') ?>" class="nav-item nav-link">Order</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>

                            <?php
                                $session = $this->session->userdata('email');
                                if (isset($session)) {
                            ?>
                                <div class="btn-group ml-3">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My
                                        Account</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Profil</a>
                                        <a href="<?php echo base_url('User_auth/logout'); ?>" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <a href="<?= site_url('user/login') ?>" class="btn btn-sm btn-primary ml-3">Login/Register</a>
                            <?php } ?>
                            
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>