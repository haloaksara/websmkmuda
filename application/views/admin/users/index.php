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
                            <a class="btn btn-primary btn-round ms-auto" href="<?= site_url('admin/master/users/add') ?>">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </a>
                            <button class="btn btn-warning btn-round ms-2" id="resetPasswordBtn">
                                <i class="fa fa-key"></i>
                                Reset Password
                            </button>

                            <script type="text/javascript">
                                $(document).on("click", "#resetPasswordBtn", function() {
                                    const checkedBoxes = document.querySelectorAll('#userDataTable tbody input[type="checkbox"]:checked');
                                    const selectedIds = Array.from(checkedBoxes).map(checkbox => checkbox.value);

                                    if (selectedIds.length === 0) {
                                        Swal.fire({
                                            title: "Tidak ada data terpilih!",
                                            text: "Silakan pilih data terlebih dahulu.",
                                            icon: "warning",
                                            button: "Ok",
                                        });
                                        return;
                                    }

                                    Swal.fire({
                                        title: 'Reset password?',
                                        text: "Yakin ingin mereset password untuk data yang dipilih?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Reset'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                method: "POST",
                                                url: "<?php echo base_url('User/reset_password'); ?>",
                                                data: { ids: selectedIds },
                                                success: (data) => {
                                                    console.log(data);
                                                    if (data.status == 'berhasil') {
                                                        Swal.fire({
                                                            title: "Berhasil!",
                                                            text: data.message,
                                                            icon: "success",
                                                            button: "Ok",
                                                        }).then(() => {
                                                            reload_table();
                                                        });
                                                    } else {
                                                        Swal.fire("Oops...", "Tidak ada data untuk diimpor", "error");
                                                    }
                                                },
                                                error: function() {
                                                    Swal.fire({
                                                        title: "Terjadi kesalahan!",
                                                        text: "Gagal mereset password.",
                                                        icon: "error",
                                                        button: "Ok",
                                                    });
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userDataTable" class="display table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"></th>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($user as $u){ 
                                    ?>
                                    <tr>
                                        <td><?= $u->name ?? '-'; ?></td>
                                        <td><?= $u->email ?? '-'; ?></td>
                                        <td><?= $u->phone ?? '-'; ?></td>
                                        <td>
                                            <?php
                                                if ($u->gender == '0') {
                                                    echo 'perempuan';
                                                }elseif ($u->gender == '1') {
                                                    echo 'laki-laki';
                                                }else{
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                                if ($u->is_active == '0') {
                                                    echo 'non-aktif';
                                                }elseif ($u->is_active == '1') {
                                                    echo 'aktif';
                                                }else{
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('admin/users/edit/' . $u->id) ?>"
                                                class="btn btn-warning btn-sm">Edit</a>

                                            <a href="#" class="btn btn-danger btn-sm delete" data-id="<?= $u->id ?>">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('#userDataTable tbody input[type="checkbox"]');
        checkboxes.forEach(checkbox => { 
            checkbox.checked = source.checked;
        });
    }

    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#userDataTable').DataTable({
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
                "url": "<?php echo site_url('admin/master/users/list') ?>",
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
                    url: "<?php echo base_url('User/delete'); ?>",
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
