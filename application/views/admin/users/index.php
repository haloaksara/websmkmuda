<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/partials/head') ?>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('admin/partials/sidebar') ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php $this->load->view('admin/partials/navbar'); ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Dashboard</h3>
                            <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">User</li>
                        </ol>

                        <a href="<?= site_url('user') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Add Data</a>
                        
                        <?php echo $this->session->flashdata('pesan') ?>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($product as $p){ 
                                    ?>
                                        <tr>
                                            <td><?= $p->code; ?></td>
                                            <td><?= $p->name; ?></td>
                                            <td><?= $p->price; ?></td>
                                            <td><?= $p->stock; ?></td>
                                            <td><?= $p->status; ?></td>
                                            <td>
                                            <a href="<?= site_url('product-edit/' . $p->id) ?>" class="btn btn-warning btn-sm">Edit</a>

                                            <a href="<?= site_url('product-delete/' . $p->id) ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php $this->load->view('admin/partials/footer.php'); ?>

            </div>
        </div>
        
        <?php $this->load->view('admin/partials/js.php'); ?>
    </body>
</html>
