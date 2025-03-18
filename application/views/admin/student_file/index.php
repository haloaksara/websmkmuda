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
        <div class="row mb-3">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="filter_class">Filter Kelas</label>
                    <select id="filter_class" class="form-select">
                        <option value="">Semua Kelas</option>
                        <?php foreach ($class as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="filter_major">Filter Jurusan</label>
                    <select id="filter_major" class="form-select">
                        <option value="">Semua Jurusan</option>
                        <?php foreach ($major as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button id="btn-search" class="btn btn-primary">Cari</button>
            </div>
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
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas/Jurusan</th>
                                        <th>File</th>
                                        <th width="25%">Action</th>
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

<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function () {
        // Inisialisasi DataTable
        table = $('#dataTable').DataTable({
            scrollX: true,
            fixedHeader: true,
            scrollCollapse: true,
            processing: true,
            order: [],
            oLanguage: {
                sProcessing: "<img src='<?php base_url(); ?>assets/tambahan/gambar/loading.gif' width='30px'>",
                "oPaginate": {
                    "sPrevious": "Prev"
                },
                "sEmptyTable": "Data tidak ada di server"
            },
            ajax: {
                url: "<?php echo site_url('admin/student_file/list') ?>",
                type: "POST",
                data: function (d) {
                    d.filter_class = $('#filter_class').val();
                    d.filter_major = $('#filter_major').val();
                    d.filter_status = $('#filter_status').val();
                }
            },
            columnDefs: [{
                    targets: [-1],
                    orderable: false,
                },
                {
                    targets: [1],
                    createdCell: function (td, cellData, rowData, row, col) {
                        if (cellData == '-') {
                            $(td).css('text-align', 'center')
                        }
                    }
                }
            ],
            createdRow: function (row, data, dataIndex) {
                if (data[2] == '' || data[2] == '-') {
                    $(row).addClass('table-danger');
                }
            }
        });

        // Event ketika tombol filter ditekan
        $('#btn-search').click(function () {
            table.ajax.reload();
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#dataTable').on('click', '.upload-btn', function() {
        var file_type_id = $(this).data('file-type-id');
        var studentId = $(this).data('id');
        var fileInput = $('<input type="file" accept=".jpg,.jpeg,.png,.pdf,.docx,.xlsx" style="display:none;">');

        fileInput.click();

        fileInput.change(function() {
            var file = this.files[0];
            console.log(file);
            
            if (file) {
                var formData = new FormData();
                formData.append('file', file);
                formData.append('id', studentId);
                formData.append('file_type_id', file_type_id);
                console.log(formData);
                

                $.ajax({
                    url: "<?= site_url('admin/student_file/upload_file') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        Swal.fire({
                            title: "Mengupload...",
                            text: "Harap tunggu...",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        if (response.status === 'success') {
                            Swal.fire("Berhasil!", response.message, "success");
                            table.ajax.reload();
                        } else {
                            Swal.fire("Gagal!", response.message, "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "Terjadi kesalahan saat mengupload file", "error");
                    }
                });
            }
        });
    });
});
</script>

