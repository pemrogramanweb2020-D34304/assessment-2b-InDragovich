<?php 
require 'functions.php';

$pakaian = query ("SELECT * FROM pakaian");

//tombol cari yang sudah ditekan
if (isset($_POST["cari"])) {
    $pakaian = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Selamat datang di Toko Dark Store</h1>
<h2>Daftar Pakaian</h1>

    <br> <br>
    <form action="" method="post">
        <a href="index.php" title=""> Kembali</a>
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
        <br><br>
        <a href="tambah.php" title=""> Tambah Pakaian</a>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
    	<tr>
    		<th>No.</th>
    		<th>Aksi</th>
    		<th>Gambar</th>
    		<th>Nama Baju</th>
    		<th>Harga Baju</th>
    	</tr>
    	<?php $i = 1; ?>

    	<?php  foreach ($pakaian as $row) : ?>
           <tr>
              <td><?= $i ?> </td>
              <td>
                <a href="keranjang.php?id=<?= $row["id"]; ?>">Tambahkan ke keranjang</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a> |
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
            </td>
            <td><img src="img/<?= $row["gambar"];  ?>" width="50" alt=""> </td>
            <td><?= $row["namabaju"];?></td>
            <td><?= $row["harga"];?></td>
        </tr>
        <?php $i++; ?>
    <?php  endforeach; ?>

  </table>
  <br>
  <a href="keranjang.php?id=<?= $row["id"]; ?>">Pembayaran</a>
</body>
</html>