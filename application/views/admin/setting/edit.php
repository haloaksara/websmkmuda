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
                        <form action="<?= base_url('Setting/update') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" value="<?= $settings->id ?>" name="id">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="key">Key*</label>
                                    <select name="key" id="key" class="form-control form-select" onchange="updateInputField()" required>
                                        <option value="">Pilih Key</option>
                                        <option value="countdown" <?= $settings->key == 'countdown' ? 'selected' : '' ?>>countdown</option>
                                        <option value="visi" <?= $settings->key == 'visi' ? 'selected' : '' ?>>visi</option>
                                        <option value="misi" <?= $settings->key == 'misi' ? 'selected' : '' ?>>misi</option>
                                        <option value="profile" <?= $settings->key == 'profile' ? 'selected' : '' ?>>profile</option>
                                        <option value="favicon" <?= $settings->key == 'favicon' ? 'selected' : '' ?>>favicon</option>
                                        <option value="logo" <?= $settings->key == 'logo' ? 'selected' : '' ?>>logo</option>
                                        <option value="school_name" <?= $settings->key == 'school_name' ? 'selected' : '' ?>>Nama Sekolah</option>
                                        <option value="address" <?= $settings->key == 'address' ? 'selected' : '' ?>>Alamat</option>
                                        <option value="phone" <?= $settings->key == 'phone' ? 'selected' : '' ?>>Telepon sekolah</option>
                                        <option value="email" <?= $settings->key == 'email' ? 'selected' : '' ?>>Email Sekolah</option>
                                        <option value="headmaster" <?= $settings->key == 'headmaster' ? 'selected' : '' ?>>Kepala Sekolah</option>
                                        <option value="url_map" <?= $settings->key == 'url_map' ? 'selected' : '' ?>>url map</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group" id="value-container">
                                    <label for="value">Value*</label>
                                    <?php if ($settings->key == 'countdown'): ?>
                                        <input type="date" class="form-control" id="value" name="value" value="<?= $settings->value ?>" required />
                                    <?php elseif (in_array($settings->key, ['favicon', 'logo'])): ?>
                                        <input type="file" class="form-control" id="value" name="value" />
                                        <?php if (!empty($settings->value)): ?>
                                            <small>File saat ini: <a href="<?= base_url('uploads/' . $settings->value) ?>" target="_blank"><?= $settings->value ?></a></small>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <input type="text" class="form-control" id="value" placeholder="Masukkan value" name="value" value="<?= $settings->value ?>" required />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    <a href="<?= base_url('setting/index') ?>" class="btn btn-warning mt-3">Batal</a>
                                </div>
                            </div>
                        </div>

                        <script>
                            function updateInputField() {
                                const key = document.getElementById('key').value;
                                const valueContainer = document.getElementById('value-container');
                                let inputField = '';

                                if (key === 'countdown') {
                                    inputField = '<input type="date" class="form-control" id="value" name="value" required />';
                                } else if (key === 'favicon' || key === 'logo') {
                                    inputField = '<input type="file" class="form-control" id="value" name="value" />';
                                } else {
                                    inputField = '<input type="text" class="form-control" id="value" placeholder="Masukkan value" name="value" required />';
                                }

                                valueContainer.innerHTML = `
                                    <label for="value">Value*</label>
                                    ${inputField}
                                `;
                            }
                        </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
