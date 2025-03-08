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

// fungsi untuk upload gambar
function upload() {
    // ambil data gambar
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png']; //ekstensi gambar yang diizinkan
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
    $konten = htmlspecialchars($data["konten"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal_post = htmlspecialchars($data["tanggal_post"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
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

    $id = $data["id"];

    // ambil data lama
    $dataLama = query("SELECT * FROM tb_berita WHERE id = $id")[0];

    // tampung inputan
    $judul = $data["judul"];
    $konten = $data["konten"];
    $status = $data["status"];
    $tanggal_post = $data["tanggal_post"];
    $gambar = $data["gambar"];

    // cek apakah user pilih gambar baru atau tidak, jika iya maka upload gambar baru dan hapus gambar lama
    if ($data['gambar'] != $dataLama['gambar']) {
        unlink('img/' . $dataLama['gambar']);
    }

    // query update data
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
?>

