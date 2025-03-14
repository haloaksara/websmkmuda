<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('admin/partials/head.php'); ?>

    <body class="sb-nav-fixed">
        
    <?php $this->load->view('admin/partials/navbar.php'); ?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

            <?php $this->load->view('admin/partials/sidebar.php'); ?>

            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Product
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('produk/add_action'); ?>" enctype="multipart/form-data" method="post">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="">Code</label>
                                            <input type="text" class="form-control" placeholder="Code" name="code">
                                        </div>
                                        <div class="col-6">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" placeholder="name" name="name">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="slug" name="slug">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="price" name="price">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="stock" name="stock">
                                        </div>
                                        <div class="col-6">
                                            <select name="status" id="" class="form-control form-select">
                                                <option value="0">Draft</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <input type="file" class="form-control" placeholder="image" name="image">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <textarea name="description" id="" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                            <a href="javascript:history.go(-1)" class="btn btn-danger"> Kembali</a>
                                        </div>
                                    </div>
                                </form>
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
