<?php
include 'function.php';

$id = $_GET['id'];
$berita = query("SELECT * FROM tb_berita WHERE id = '$id'")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // lakukan pengecekan apakah upload gambar?
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['gambar']['name'];
        $fileTmpPath = $_FILES['gambar']['tmp_name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
    
        // lakukan pengecekan apakah ekstensi file yang diupload sesuai dengan yang diizinkan
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = 'img/';
            $dest_path = $uploadFileDir . $fileName;
    
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $_POST['gambar'] = $fileName;
            } else {
                echo "<script>alert('Error moving the uploaded file.');</script>";
            }
        } else {
            echo "<script>alert('Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions) . "');</script>";
        }
    } else {
        $_POST['gambar'] = $berita['gambar'];
    }

    $result = ubah($_POST);

    if ($result) {
        echo "<script>alert('Data berhasil diubah');document.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }                   
}
?>

<!DOCTYPE html>
<html>

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
					<h1 class="h2">Tambah Berita</h1>
				</div>
				<form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $berita['id'] ?>" required>
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul'] ?>" required>
					</div>
					<div class="form-group">
						<label for="konten">Konten</label>
						<textarea class="form-control" id="konten" name="konten" rows="5" required><?= $berita['konten'] ?></textarea>
					</div>
					<div class="form-group">
						<label for="gambar">Gambar</label>
                        <?php if (!empty($berita['gambar'])): ?>
                            <div class="mb-2">
                            <img src="img/<?= $berita['gambar'] ?>" alt="Gambar Berita" style="max-width: 200px;">
                            </div>
                        <?php endif; ?>
						<input type="file" class="form-control-file" id="gambar" name="gambar">
					</div>
					<div class="form-group">
						<label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="0" <?= $berita['status'] == 0 ? 'selected' : '' ?>>Draft</option>
                            <option value="1" <?= $berita['status'] == 1 ? 'selected' : '' ?>>Publish</option>
                        </select>
					</div>
					<div class="form-group">
						<label for="tanggal_post">Tanggal Post</label>
						<input type="date" class="form-control" id="tanggal_post" name="tanggal_post" value="<?= $berita['tanggal_post'] ?>" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Tambah Berita</button>
				</form>
			</main>
		</div>
	</div>
</body>

</html>
