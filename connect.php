<?php 
 $host ="localhost";
 $user ="root";
 $pss ="";
 $db ="sekolahkita";

 $con = new mysqli($host, $user, $pss, $db);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

 ?>