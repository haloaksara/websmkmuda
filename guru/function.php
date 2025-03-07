<?php 

$conn=mysqli_connect("localhost","root","","sekolahkita");

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

 	$kode = $data["kode_guru"];
 	$nama = $data["nama_guru"];
 	$alamat = $data["alamat"];
 	$notelp = $data["no_telp"];
 	$user = $data["username"];
 	$pass = $data["password"];

 	$query ="INSERT INTO tb_guru
 			VALUES ('$kode', '$nama', '$alamat', '$notelp', '$user', '$pass')";
 	mysqli_query($conn,$query);

 	return mysqli_affected_rows($conn);

}

function hapus($kode_guru){
	
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_guru WHERE kode_guru='$kode_guru'");
	return mysqli_affected_rows($conn);
}
function ubah($data){
	global $conn;
	// var_dump($data["alamat"]);die;

	$kode = $data["kode_guru"];
	$nama = $data["nama_guru"];
	$alamat = $data["alamat"];
	$notelp = $data["no_telp"];
	$user = $data["username"];
	$pass = $data["password"];

	$query = "UPDATE tb_guru SET 
				nama_guru = '$nama', 
				alamat = '$alamat', 
				no_telp = '$notelp', 
				password = '$pass' 
			  WHERE kode_guru = '$kode'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
} 


?>

