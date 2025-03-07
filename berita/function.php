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

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check if no file is uploaded
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // Check if the uploaded file is an image
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // Check if the file size is too large
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // Generate new file name
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // Move the uploaded file to the img folder
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambah($data) {
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $konten = htmlspecialchars($data["konten"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal_post = htmlspecialchars($data["tanggal_post"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO tb_berita
                (judul, konten, gambar, status, tanggal_post)
              VALUES
                ('$judul', '$konten', '$gambar', '$status', '$tanggal_post')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
	
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_berita WHERE id='$id'");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    // var_dump($data);die;

    $id = $data["id"];

    // ambil data lama
    $dataLama = query("SELECT * FROM tb_berita WHERE id = $id")[0];

    // tampung inputan
    $judul = $data["judul"];
    $konten = $data["konten"];
    $status = $data["status"];
    $tanggal_post = $data["tanggal_post"];
    $gambar = $data["gambar"];

    // Check if user uploaded a new image
    if ($data['gambar'] != $dataLama['gambar']) {
        unlink('img/' . $dataLama['gambar']);
    }

    $query = "UPDATE tb_berita SET 
                judul = '$judul', 
                konten = '$konten', 
                gambar = '$gambar', 
                status = '$status', 
                tanggal_post = '$tanggal_post' 
              WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahOld($data){
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

