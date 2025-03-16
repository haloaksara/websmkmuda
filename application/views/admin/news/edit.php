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
                        <form action="<?= base_url('News/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="id" value="<?= $news->id ?>" hidden>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="title">Judul*</label>
                                        <input type="text" class="form-control" id="title" placeholder="Masukkan Judul" name="title" value="<?= $news->title ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="date">Tanggal Posting</label>
                                        <input type="date" class="form-control" id="date" placeholder="" name="post_date" value="<?= $news->post_date ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="status">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="1" <?= $news->status == 1 ? 'selected' : '' ?>>Publish</option>
                                            <option value="0" <?= $news->status == 0 ? 'selected' : '' ?>>Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="file">File</label>
                                        <input type="file" class="form-control" id="file" placeholder="file" name="file"/>
                                        <?php 
                                            if ($news->file != null) {
                                                echo '<a href="./upload/news/'.$news->file.'" class="btn btn-xs btn-primary">Download File</a>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="image">Gambar</label>
                                        <input type="file" class="form-control" name="image" id="image" onchange="return fileValidation()" />
                                        <p style='color: red; font-size: 14px;'> *Maksimal File Foto 2 MB</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div id="slider">
                                            <?php
                                                if ($news->image != null) {
                                                    echo '<img class="img-thumbnail" width="200px" height="200px" src="' . base_url() . 'upload/news/' . $news->image . '" alt="your image" />';
                                                } else {
                                                    echo '<img class="img-thumbnail" width="200px" height="200px" src="' . base_url() . 'assets/tambahan/gambar/tidak-ada.png" alt="your image" />';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Konten</label>
                                        <textarea class="form-control" id="content" rows="5" name="content"><?= $news->content ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                    <a href="<?= site_url('admin/news') ?>" class="btn btn-warning mt-3">Batal</a>
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
<script type="text/javascript">
function fileValidation() {
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
   
        //Image preview
        if (fileInput.files && fileInput.files[0].size > 2007200) {
            toastr.error('File harus maksimal 2 MB', 'Warning', {
                timeOut: 5000
            }, toastr.options = {
                "closeButton": true
            });
            fileInput.value = '';
            return false;
        } else if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('slider').innerHTML = '<img width="400px" heiht="300px"  src="' + e.target
                    .result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    
}
</script>