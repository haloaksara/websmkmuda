<?php
include 'function.php';

$kode_guru = $_GET['kode_guru'];
$guru = query("SELECT * FROM tb_guru WHERE kode_guru = '$kode_guru'")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

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
    <title>Ubah Data Guru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title text-center">Ubah Data Guru 😍</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="kode_guru">Kode Guru</label>
                    <input type="text" class="form-control" id="kode_guru" name="kode_guru" value="<?php echo $guru['kode_guru']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $guru['nama_guru']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $guru['alamat']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $guru['no_telp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $guru['username']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
            </form>
        </div>
    </div>
</body>
</html>
