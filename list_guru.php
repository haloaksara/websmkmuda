<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard Sederhana</title>

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
            <h2>Halaman Data Guru</h2>
	
			<br/>
		 
			<!-- cek apakah sudah login -->
			<?php 
			session_start();
			if($_SESSION['status']!="login"){
				header("location:login.php?pesan=belum_login");
			}
			?>
		 
			<a href="form_tambah_guru.php">Tambah Data</a>
			<br/>

			<table border="1" cellspacing="0" cellpadding="10" width="100%">
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>aksi</th>		
				</tr>
				
				<?php 
				include "connect.php";
				$query_mysql = mysqli_query($con,"SELECT * FROM tb_guru")or die(mysqli_error());
				$nomor = 1;
				while($data = mysqli_fetch_array($query_mysql)){
				?>
				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $data['kode_guru']; ?></td>
					<td><?php echo $data['nama_guru']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td>
						<a class="edit" href="edit_guru.php?kode_guru=<?php echo $data['kode_guru']; ?>">Edit</a> |
						<a class="hapus" href="hapus_guru.php?kode_guru=<?php echo $data['kode_guru']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>		
					</td>
				</tr>
				<?php } ?>

			</table>
        </main>
    </div>
</body>
</html>
