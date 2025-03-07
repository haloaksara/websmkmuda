<?php 
    require 'function.php';

    $berita=query("SELECT * FROM tb_berita");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sederhana</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/Css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar h2 {
            color: #fff;
            padding: 15px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-bottom: none;
            font-weight: bold;
        }

        .card-body {
            border-radius: 10px;
        }

        .main-content {
            padding: 20px;
        }

        .btn-custom {
            margin-top: 20px;
        }

        .sidebar {
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }

        .main-content {
            transition: all 0.3s;
            margin-left: 250px;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .toggle-btn {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 1000;
            cursor: pointer;
        }

        .toggle-btn i {
            font-size: 24px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="toggle-btn" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </div>
            <nav id="sidebar" class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h2>Menu</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="guru/index.php">Data Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="berita/index.php">Data Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Data Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Keluar</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Data Berita</h1>
                </div>
                <div class="row">
                    <a href="tambah.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($berita as $row) : ?>
                            <tr>
                                <td><?=$i ?></td>
                                <td><?= $row["judul"] ?></td>
                                <td><?= $row["konten"] ?></td>
                                <td><img src="img/<?= $row["gambar"] ?>" alt="" style="width: 100px; height: auto;"></td>
                                <td>
                                    <?php
                                    if ($row["status"] == 1) {
                                        echo "Publish";
                                    }else{
                                        echo "Draft";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="ubah.php?id=<?= $row["id"] ?>" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i> Ubah</a>
                                    <a href="hapus.php?id=<?= $row["id"]?>"
                                        onclick="return confirm('yakin?');" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('expanded');
        });
    </script>
</body>

</html>
