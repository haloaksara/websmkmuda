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
                        <form action="<?= base_url('Student/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="id" value="<?= $student->id ?>" hidden>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nis">NIS*</label>
                                        <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS"
                                            name="nis" value="<?= $student->nis ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control" id="nisn" placeholder="Masukkan NISN"
                                            name="nisn"  value="<?= $student->nisn ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="full_name">Nama Lengkap*</label>
                                        <input type="text" class="form-control" id="full_name"
                                            placeholder="Masukkan Nama" name="full_name" value="<?= $student->full_name ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="" class="form-select">
                                            <option value="1" <?= $student->gender == 1 ? 'selected' : '' ?>>Laki-laki</option>
                                            <option value="0" <?= $student->gender == 0 ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">Kelas</label>
                                        <select name="class_id" id="" class="form-select" required>
                                            <?php foreach ($class as $cl) : ?>
                                            <option value="<?= $cl->id ?>" <?= $student->class_id == $cl->id ? 'selected' : '' ?>>
                                                <?= $cl->name ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="major_id">Jurusan</label>
                                        <select name="major_id" id="" class="form-select" required>
                                            <?php foreach ($major as $mj) : ?>
                                            <option value="<?= $mj->id ?>" <?= $student->major_id == $mj->id ? 'selected' : '' ?>>
                                                <?= $mj->name ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="place_of_birth">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="place_of_birth"
                                            placeholder="Masukkan Tempat Lahir" name="place_of_birth" value="<?= $student->place_of_birth ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="date_of_birth"
                                            placeholder="Masukkan Tanggal Lahir" name="date_of_birth" value="<?= $student->date_of_birth ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telepon</label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="Masukkan Nomor Telepon" name="phone" value="<?= $student->phone ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Masukkan Email"
                                            name="email" value="<?= $student->email ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="" class="form-select">
                                            <option value="1" <?= $student->status == 1 ? 'selected' : '' ?>>Aktif</option>
                                            <option value="2" <?= $student->status == 2 ? 'selected' : '' ?>>Lulus</option>
                                            <option value="3" <?= $student->status == 3 ? 'selected' : '' ?>>Keluar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="father_name">Nama Lengkap Ayah</label>
                                        <input type="text" class="form-control" id="father_name"
                                            placeholder="Masukkan Nama Ayah" name="father_name" value="<?= $student->father_name ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="father_phone">Nomor Telepon Ayah</label>
                                        <input type="text" class="form-control" id="father_phone"
                                            placeholder="Masukkan Telepon Ayah" name="father_phone" value="<?= $student->father_phone ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="father_job">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="father_job"
                                            placeholder="Masukkan Pekerjaan Ayah" name="father_job" value="<?= $student->father_job ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_name">Nama Lengkap Ibu</label>
                                        <input type="text" class="form-control" id="mother_name"
                                            placeholder="Masukkan Nama Ibu" name="mother_name" value="<?= $student->mother_name ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_phone">Nomor Telepon Ibu</label>
                                        <input type="text" class="form-control" id="mother_phone"
                                            placeholder="Masukkan Telepon Ibu" name="mother_phone" value="<?= $student->mother_phone ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_job">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="mother_job"
                                            placeholder="Masukkan Pekerjaan Ibu" name="mother_job" value="<?= $student->mother_job ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" id="address" rows="5" name="address"
                                            placeholder="Alamat"><?= $student->address ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                        <a href="<?= site_url('admin/master/student') ?>"
                                            class="btn btn-warning mt-3">Batal</a>
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