<?php 
    require 'function.php';

    $guru=query("SELECT * FROM tb_guru");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sederhana</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .content a.btn {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        table th {
            background-color: #343a40;
            color: #fff;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                text-align: center;
            }
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="../dashboard.php"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="index.php"><i class="fas fa-chalkboard-teacher"></i> Data Guru</a></li>
                <li><a href="#"><i class="fas fa-newspaper"></i> Data Berita</a></li>
                <li><a href="#"><i class="fas fa-user-graduate"></i> Data Siswa</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
            </ul>
        </nav>
        <main class="content">
            <a href="tambah.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach ($guru as $row) : ?>
                    <tr>
                        <td><?=$i ?></td>
                        <td><?= $row["kode_guru"] ?></td>
                        <td><?= $row["nama_guru"] ?></td>
                        <td><?= $row["alamat"] ?></td>
                        <td><?= $row["no_telp"] ?></td>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["password"]?></td>
                        <td>
                            <a href="ubah.php?kode_guru=<?= $row["kode_guru"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="hapus.php?kode_guru=<?= $row["kode_guru"]?>" onclick="return confirm('yakin?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
