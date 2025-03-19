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
</script>
