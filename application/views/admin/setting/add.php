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
                        <form action="<?= base_url('Setting/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <script>
                                    function updateInputField() {
                                        const key = document.getElementById('key').value;
                                        const valueContainer = document.getElementById('value-container');
                                        valueContainer.innerHTML = ''; // Clear previous input field

                                        if (key === 'countdown') {
                                            valueContainer.innerHTML = `
                                                <label for="value">Value*</label>
                                                <input type="date" class="form-control" id="value" name="value" required />
                                            `;
                                        } else if (key === 'favicon' || key === 'logo') {
                                            valueContainer.innerHTML = `
                                                <label for="value">Value*</label>
                                                <input type="file" class="form-control" id="value" name="image" required />
                                            `;
                                        } else {
                                            valueContainer.innerHTML = `
                                                <label for="value">Value*</label>
                                                <input type="text" class="form-control" id="value" placeholder="Masukkan value" name="value" required />
                                            `;
                                        }
                                    }
                                </script>

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="key">Key*</label>
                                        <select name="key" id="key" class="form-control form-select" onchange="updateInputField()" required>
                                            <option value="">Pilih Key</option>
                                            <option value="countdown">countdown</option>
                                            <option value="visi">visi</option>
                                            <option value="misi">misi</option>
                                            <option value="profile">profile</option>
                                            <option value="favicon">favicon</option>
                                            <option value="logo">logo</option>
                                            <option value="school_name">Nama Sekolah</option>
                                            <option value="address">Alamat</option>
                                            <option value="phone">Telepon sekolah</option>
                                            <option value="email">Email Sekolah</option>
                                            <option value="headmaster">Kepala Sekolah</option>
                                            <option value="url_map">url map</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group" id="value-container">
                                        <label for="value">Value*</label>
                                        <input type="text" class="form-control" id="value" placeholder="Masukkan value" name="value" required />
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    <a href="<?= base_url('setting/index') ?>" class="btn btn-warning mt-3">Batal</a>
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
