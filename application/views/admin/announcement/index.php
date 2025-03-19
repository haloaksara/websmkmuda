<div class="container">
    <div class="page-inner">
        <div class="page-header">
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
            <input type="text" id="type" value="<?= $type ?>" hidden>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title ?></h4>
                            <a class="btn btn-primary btn-round ms-auto" href="<?= site_url('admin/announcement/add?type='.$type) ?>">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </a>
                            <a class="btn btn-success btn-round" href="#" data-bs-toggle="modal" data-bs-target="#modal-import"><i class="fas fa-upload"></i> Impor
                                Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <?php if ($type == 'private') { ?>
                                            <th width="20%">Judul</th>
                                            <th width="40%">Deskripsi</th>
                                            <th width="15%">status</th>
                                        <?php }else{ ?>
                                            <th width="20%">Judul</th>
                                            <th width="20%">Deskripsi</th>
                                            <th width="15%">status</th>
                                            <th width="25%">File</th>
                                        <?php } ?>
                                        
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="import_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" id="excel-submit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="import_modalLabel">Impor Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Impor Data di sini:</label>
                        <input type="file" class="form-control" name="import_file" required>
                        <br>
                        <small>Pastikan anda telah membuat file impor dengan format .xls atau .xlsx sesuai dengant
                            template
                            yang disediakan. Untuk mendapatkan template, silakan dowload melalui tombol download format
                            import
                            dibawah. <br>
                            <a href="<?= base_url('upload/import_kelulusan.xlsx') ?>">di sini</a>

                            Data yang harus diisi antara lain "NIS(wajib)", "Nama Siswa", "NISN", "Judul Pengumuman", "Deskripsi",
                            "Status Kelulusan"</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var type = $('#type').val();

    $(document).ready(function() {

        //datatables
        table = $('#dataTable').DataTable({
            scrollX: true, // Pagination and other in head and footer fixed 
            fixedHeader: true,
            //scrollY: '500px',
            scrollCollapse: true,
            //paging: false,
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            oLanguage: {
                sProcessing: "<img src='<?php base_url(); ?>assets/tambahan/gambar/loading.gif' width='30px'>",
                "oPaginate": {
                    "sPrevious": "Prev"
                },
                "sEmptyTable": "Data tidak ada di server"
            },

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/announcement/list?type=') ?>" + type,
                "type": "POST"

            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [1],
                    "createdCell": function(td, cellData, rowData, row, col) {
                        if (cellData == '-') {
                            $(td).css('text-align', 'center')
                        }
                    }
                }
            ],

            "createdRow": function(row, data, dataIndex) {
                if (data[2] == '' || data[2] == '-') {
                    $(row).addClass('table-danger');
                }
            }

        });

    });

    $(document).on("click", ".delete", function() {
        var id = $(this).attr("data-id");
        Swal.fire({
            title: 'Hapus data?',
            text: "Yakin anda akan menghapus data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('Announcement/delete'); ?>",
                    data: "id=" + id,
                    success: function(data) {
                        $("tr[data-id='" + id + "']").fadeOut("fast", function() {
                            $(this).remove();
                        });
                        hapus_berhasil();
                    }
                });
            }
        })
    });

    function hapus_berhasil() {
        Swal.fire({
            title: "Data berhasil dihapus!",
            text: "Klik tombol Ok untuk melanjutkan!",
            icon: "success",
            button: "Ok",
        }).then((result) => {
            if (result.isConfirmed) {
                reload_table();
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function import_berhasil() {
        Swal.fire({
            title: "Data berhasil diimport!",
            text: "Klik tombol Ok untuk melanjutkan!",
            icon: "success",
            button: "Ok",
        }).then((result) => {
            if (result.isConfirmed) {
                reload_table();
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#excel-submit').submit(function(e) { 
            e.preventDefault();
            var formData = new FormData(this);
            Swal.fire({
            title: 'Sedang di proses',
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
                Swal.showLoading();
            }
            });
            $.ajax({
            type: 'POST',
            url: "<?= site_url('admin/announcement/import') ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',  // Tambahkan ini
            success: (data) => {
                this.reset();

                $('#modal-import').modal('hide');
                if (data.status == 'berhasil') {
                    import_berhasil();
                } else {
                    Swal.fire("Oops...", "Tidak ada data untuk diimpor", "error");
                }
            },
            error: function(data) {
                Swal.fire("Oops...", "Ada Sesuatu yang Salah :(", "error");
            }
            });
        });
    });
</script>