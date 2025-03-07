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
			<form method="post" action="aksi_tambah_guru.php">
				<table>
					<tr>			
						<td>Kode Guru</td>
						<td><input type="text" name="kode_guru"></td>
					</tr>
					<tr>			
						<td>Nama Guru</td>
						<td><input type="text" name="nama_guru"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><input type="text" name="alamat"></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td><input type="text" name="no_telp"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="text" name="password"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="SIMPAN"></td>
					</tr>		
				</table>
			</form>
	    </main>
    </div>
    
 
	
</body>
</html>