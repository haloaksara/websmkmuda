<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <!-- <h3 class="fw-bold mb-3"><?= $title ?></h3> -->
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $breadcrumb1 ?></a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $breadcrumb2 ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('Role/update') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" value="<?= $roles->id ?>" name="id">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="name" value="<?= $roles->name ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <table>
                                        <tr>
                                            <td width="20%">
                                                <label for="name">Akses</label>
                                            </td>
                                            <td>
                                                <ul>
                                                    <?php foreach ($permissions as $permission) : ?>
                                                        <li>
                                                            <input type="checkbox" name="permission[]" value="<?= $permission->id ?>" <?= in_array($permission->id, array_column($role_permissions, 'permission_id')) ? 'checked' : '' ?>>
                                                            <?= $permission->name ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                    
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    <a href="<?= site_url('admin/role') ?>" class="btn btn-warning mt-3">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
