<?php 
include 'connect.php';
 
$kode_guru = $_POST['kode_guru'];
$nama_guru = $_POST['nama_guru'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];
 
// update data ke database
mysqli_query($con,"update tb_guru set kode_guru='$kode_guru', nama_guru='$nama_guru', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password' where kode_guru='$kode_guru'");
 
// mengalihkan halaman kembali ke index.php
header("location:list_guru.php");
 
?>