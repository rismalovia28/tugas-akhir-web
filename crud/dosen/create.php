<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info">Data Dosen</div>
		<a href="create.php" class="btn btn-info">Tambah Data</a>
		<?php 
		require '..//koneksi.php';
		if (isset($_POST['simpan'])) {
		$input_nip = $_POST['txtnip'];
		$input_nama = $_POST['txtnama'];
		$input_alamat = $_POST['txtalamat'];

		$query ="INSERT INTO dosen VALUES('$input_nip', '$input_nama', '$input_alamat')";
		$result = mysqli_query($link, $query);

		if ($result) {
			header('location: index.php');

		

		} else {
			echo 'Gagal disimpan : ' . mysqli_error($link);
		}
		// 	header('location: index.php')
		// 	# code...
		// } else {
  //         echo 'Gagal dinsimpa:' . mysqli_error($link);
		// }
		//  	# code...
		 } 
		 ?>
		<form action="" method="post">
			<div class="form-grup">
				<label for="">NIP</label>
				<input type="text" class="form-control" name="txtnip">
			</div>

			<div class="form-grup">
				<label for="">Nama</label>
				<input type="text" class="form-control" name="txtnama">

					<div class="form-grup">
				<label for="">Alamat</label>
				<input type="text" class="form-control" name="txtalamat">
				
			</div>
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan Data">
			<a href="index.php" class="btn btn-warning">Batal</a>
		</form>
		</div>

</body>
</html>