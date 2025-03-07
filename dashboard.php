<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sederhana</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Public/Css/admin.css">
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
            <h2>Menu baru</h2>
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guru/index.php">Data Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Data Berita</a>
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Selamat Datang di Dashboard</h1>
            </div>
            <div class="row">
            <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Guru</div>
                <div class="card-body">
                <h5 class="card-title">150</h5>
                <p class="card-text">Jumlah total guru yang terdaftar.</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Siswa</div>
                <div class="card-body">
                <h5 class="card-title">1200</h5>
                <p class="card-text">Jumlah total siswa yang terdaftar.</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Berita</div>
                <div class="card-body">
                <h5 class="card-title">30</h5>
                <p class="card-text">Jumlah total berita yang dipublikasikan.</p>
                </div>
            </div>
            </div>
            </div>
            <div class="row btn-custom">
            <div class="col-md-4">
            <a href="guru/tambah.php" class="btn btn-primary btn-block">Tambah Guru</a>
            </div>
            <div class="col-md-4">
            <a href="siswa/tambah.php" class="btn btn-success btn-block">Tambah Siswa</a>
            </div>
            <div class="col-md-4">
            <a href="berita/tambah.php" class="btn btn-warning btn-block">Tambah Berita</a>
            </div>
            </div>
            <p>Ini adalah contoh konten dashboard sederhana.</p>
            <p>Anda bisa menambahkan lebih banyak konten di sini.</p>
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
