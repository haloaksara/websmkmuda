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

// fungsi untuk upload file
function upload() {
    // ambil data file
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    // cek apakah tidak ada file yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih file terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlxs']; //ekstensi gambar yang diizinkan
    $ekstensiGambar = explode('.', $namaFile); //memecah nama file berdasarkan titik
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //mengambil ekstensi gambar dan diubah menjadi huruf kecil
    // cek apakah ekstensi gambar yang diupload tidak sesuai dengan yang diizinkan
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // buat nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // pindahkan file ke folder img
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]); //htmlspecialchars digunakan untuk menghindari serangan xss
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $status = htmlspecialchars($data["status"]);

    // Upload file
    $file = upload();
    if (!$file) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO tugas
                (judul, deskripsi, status, file)
              VALUES
                ('$judul', '$deskripsi', '$status', '$file')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
	
	global $conn;
	mysqli_query($conn, "DELETE FROM tugas WHERE id='$id'");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];

    // ambil data lama
    $dataLama = query("SELECT * FROM tugas WHERE id = $id")[0];

    // tampung inputan
    $judul = $data["judul"];
    $deskripsi = $data["deskripsi"];
    $status = $data["status"];
    $file = $data["file"];

    // cek apakah user pilih file baru atau tidak, jika iya maka upload file baru dan hapus file lama
    if ($data['file'] != $dataLama['file']) {
        unlink('img/' . $dataLama['file']);
    }

    // query update data
    $query = "UPDATE tugas SET 
                judul = '$judul', 
                deskripsi = '$deskripsi', 
                status = '$status', 
                file = '$file'
              WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>

