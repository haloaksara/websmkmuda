<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
	<link rel="stylesheet" type="text/css" href="Public/Css/admin.css">
</head>
<body>
	<div class="container">
        <nav class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="list_guru.php">Data Guru</a></li>
                <li><a href="#">Data Berita</a></li>
                <li><a href="#">Data Siswa</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </nav>

        <main class="content">
	    	<h2>CRUD DATA Guru</h2>
			<br/>
			<a href="list_guru.php">KEMBALI</a>
			<h3>TAMBAH DATA GURU</h3>

			<?php
				include 'connect.php';
				$kode_guru = $_GET['kode_guru'];
				$data = mysqli_query($con,"select * from tb_guru where kode_guru='$kode_guru'");
				while($d = mysqli_fetch_array($data)){
			?>

			<form method="post" action="aksi_edit_guru.php">
				<input type="hidden" name="id" value="<?php echo $d['kode_guru']; ?>">
				<table>
					<tr>			
						<td>Kode Guru</td>
						<td><input type="text" name="kode_guru" value="<?php echo $d['kode_guru']; ?>"></td>
					</tr>
					<tr>			
						<td>Nama Guru</td>
						<td><input type="text" name="nama_guru" value="<?php echo $d['nama_guru']; ?>"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td><input type="text" name="no_telp" value="<?php echo $d['no_telp']; ?>"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="text" name="password" value="<?php echo $d['password']; ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="SIMPAN"></td>
					</tr>		
				</table>
			</form>

			<?php 
			}
			?>
	    </main>
    </div>
    
 
	
</body>
</html>