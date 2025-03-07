<?php 
require 'function.php';

//Cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

//Cek apakah data berhasil ditambah atau tidak
	if (tambah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href='index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href='index.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Guru</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.container {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}
		button {
			width: 100%;
			padding: 10px;
			background-color: #28a745;
			border: none;
			border-radius: 4px;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
		}
		button:hover {
			background-color: #218838;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Tambah Data Guru</h1>
		<form action="" method="post">
			<label>Kode</label>
			<input type="text" name="kode_guru">
			<label>Nama</label>
			<input type="text" name="nama_guru">
			<label>Alamat</label>
			<input type="text" name="alamat">
			<label>No Telp</label>
			<input type="text" name="no_telp">
			<label>Username</label>
			<input type="text" name="username">
			<label>Password</label>
			<input type="password" name="password">
			<button type="submit" name="submit">Tambah Data</button>
		</form>
	</div>
</body>
</html>