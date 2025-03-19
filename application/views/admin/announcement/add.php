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
                        <form action="<?= base_url('Announcement/store') ?>" method="post" enctype="multipart/form-data">
                            <input type="text" id="type" value="<?= $type ?>" name="type" hidden>

                            <!-- start inputan untuk penguman private -->
                            <?php if ($type == 'private') { ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="student_id">Pilih Siswa</label>
                                            <select name="student_id" id="student_id" class="form-control select2" required>
                                                <option value="">Pilih Siswa</option>
                                                <?php foreach ($students as $student) { ?>
                                                    <option value="<?= $student->id ?>"><?= $student->full_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul Pengumuman" name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea class="form-control" id="description" placeholder="Masukkan Deskripsi Pengumuman" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="status_exam">Status Kelulusan</label>
                                            <select name="status_exam" id="status_exam" class="form-select">
                                                <option value="0">Tidak Lulus</option>
                                                <option value="1">Lulus</option>
                                            </select>
                                    </div>
                                </div>
                            <!-- end inputan untuk penguman private -->

                            <!-- start inputan untuk penguman public -->
                            <?php }else{?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul Pengumuman" name="title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea class="form-control" id="description" placeholder="Masukkan Deskripsi Pengumuman" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="0">Draft</option>
                                                <option value="1">Publish</option>
                                                <option value="2">Arsip</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="attachment">File</label>
                                            <input type="file" class="form-control" id="attachment" name="attachment">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- end inputan untuk penguman public -->

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    <a href="<?= site_url('admin/master/exam_type') ?>" class="btn btn-warning mt-3">Batal</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>