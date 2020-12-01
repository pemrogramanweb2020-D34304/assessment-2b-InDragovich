<?php 

//koneksi ke database 
$conn = mysqli_connect("localhost","root","","ass2");

function query($query){
	global $conn;
	$result = mysqli_query ($conn , $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function cari($keyword){
	$query = "SELECT * FROM pakaian
			WHERE
			namabaju LIKE '%$keyword%' OR
			harga LIKE '%$keyword%'
			";
	return query($query);
}

function user($data){
	global $conn;
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,stripcslashes($data["password"]));
}

function hapus ($id){
	global $conn;
	mysqli_query ($conn, "DELETE FROM pakaian WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function tambah ($data){
	global $conn;
	//ambil data dari tiap elemen dalam form
	$namabaju = htmlspecialchars($data["namabaju"]);
	$harga = htmlspecialchars($data["harga"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO pakaian VALUES('','$gambar','$namabaju','$harga')";

	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}
function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apa tidak ada gambar yg diupload
if ( $error === 4) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang diupload bukan gambar!');
			</script>";
		return false;
	}

	//cek jika ukuran terlalu besar
	if ($ukuranFile > 2500000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>";
		return false;
	}

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru.= '.';
	$namaFileBaru.= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
	return $namaFileBaru;
}
 ?>
