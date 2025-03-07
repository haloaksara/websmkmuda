<?php 

include 'connect.php';
 

$kode_guru = $_POST['kode_guru'];
$nama_guru = $_POST['nama_guru'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];
 

mysqli_query($con,"insert into tb_guru values('$kode_guru','$nama_guru','$alamat', '$no_telp', '$username', '$password')");
 

header("location:list_guru.php");
 
?>