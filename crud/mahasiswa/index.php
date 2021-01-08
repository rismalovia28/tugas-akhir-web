<!DOCTYPE html>
<html>
<head>
  
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	
</head>
<body>

	<div class="container">
		<div class="alert alert-into">Data Mahasiswa</div>
		<a href="create.php" class="btn btn-info">Tambah Data</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Prodi</th>
					<th>Aksi</th>

				</tr>
			</thead>

			<tbody>
				<?php 

				require'../koneksi.php';
				$query = "SELECT * FROM mahasiswa";
				$result = mysqli_query($link, $query);

				$no = 1;

				//Jalankan query diatas
				while ($isi = mysqli_fetch_object($result)) {
				 ?>
				
				<tr>
					<td><?= $no++; ?></td>
					<td><?php echo $isi->nim; ?></td>
					<td><?= $isi->nama_mahasiswa; ?></td>
					<td><?= $isi->prodi; ?></td>
					<td>
						<a href="delete.php?nim=<?php echo $isi->nim; ?> "
						class="btn btn-danger">Del</a>

						<a href="update.php?nim=<?php echo $isi->nim; ?> "
						class="btn btn-warning">Edit</a>
					</td>
					
				</tr>

			<?php } ?>
			</tbody>
		</table>
		
	</div>

</body>
</html>