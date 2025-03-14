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
                        <h1 class="mt-4">Product</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Product
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('produk/edit_action'); ?>" enctype="multipart/form-data" method="post">
                                    <input type="text" value="<?= $product['id'] ?>" name="id">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="code">Code</label>
                                            <input type="text" class="form-control" placeholder="Code" name="code" value="<?= $product['code'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="name" name="name" value="<?= $product['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" placeholder="slug" name="slug" value="<?= $product['slug'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" placeholder="price" name="price" value="<?= $product['price'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="stock">Stock</label>
                                            <input type="text" class="form-control" placeholder="stock" name="stock" value="<?= $product['stock'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" placeholder="status" name="status" value="<?= $product['status'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="image">Upload Image</label>
                                            <input type="file" class="form-control" placeholder="image" name="image">
                                            <label for="" style="font-size: small; color: red;">*Kosongi jika tidak diubah</label>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="" class="form-control"><?= $product['description'] ?></textarea>
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
