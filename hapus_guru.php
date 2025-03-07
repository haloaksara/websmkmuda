<?php 
include 'connect.php';
 
$kode_guru = $_GET['kode_guru'];
 
mysqli_query($con,"delete from tb_guru where kode_guru='$kode_guru'");
 
header("location:list_guru.php");
 
?>