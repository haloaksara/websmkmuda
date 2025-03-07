<?php 

require 'function.php';

$kode= $_GET["kode_guru"];

if (hapus($kode) > 0) {
	echo "
 			<script>
 				alert('data berhasil dihapus');
 				document.location.href='index.php';
 			</script>
 		";
 	}else{
 		echo "
 			<script>
 				alert('data gagal dihapus');
 				document.location.href='index.php';
 
 			</script>
 		";
 	}

 ?>