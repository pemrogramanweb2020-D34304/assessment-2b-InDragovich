<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
</head>
<body>
 

	<a href="forminput1.php">FORM INPUT</a>
	<br/>
	<table border="1">
		<tr>
			<th>No meja</th>
			<th>nama pemesan</th>
			<th>Jenis makanan</th>
			<th>Harga</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from pemesan");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['no_meja']; ?></td>
				<td><?php echo $d['nama_pemesan']; ?></td>
				<td><?php echo $d['jenis_makanan']; ?></td>
                <td><?php echo $d['harga']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['no_pesanan']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['no_pesanan']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>