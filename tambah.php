<?php 
require 'functions.php';
	//cek apakah tombol submit sudah ditekan atau belum
if (isset ($_POST["submit"])) {

	
	//cek apakah data berhasil ditambah atau tidak
	if ( tambah($_POST) > 0) {
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'index.php'
		</script>
			";
	} else {
	 	echo "
		<script>
		alert('data gagal ditambahkan');
		document.location.href = 'index.php'
		</script>
			";
	}

}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data pakaian</title>
</head>
<body>
	<h1>Tambah data pakaian</h1>
	<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		<ul>
			<li>
				<label for="namabaju">Nama Baju :</label>
				<input type="text" name="namabaju" id="namabaju" required>
			</li>
			<li>
				<label for="harga">Harga Baju :</label>
				<input type="text" name="harga" id="harga">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
		</ul>
		<button type="submit" name="submit">Tambah Data</button>
	</form>
</body>
</html>