<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">

</head>
<body>

	<!-- Mahasiswa -->
	<div class="container">
		<div class="alert alert-info">Edit Data Mahasiswa</div>
		
		

        <?php
        require'../koneksi.php';

        if (isset($_GET['nim'])) {
			$input_nim = $_GET['nim'];
			$query = "SELECT * FROM mahasiswa WHERE nim='$input_nim'";
			$result = mysqli_query($link, $query);
			$isi = mysqli_fetch_object($result);
		}
		if (isset($_POST['update'])){
			$input_nim = $_POST['txtnim'];
			$input_nama = $_POST['txtnama_mahasiswa'];
			$input_prodi = $_POST['txtprodi'];

			$query = "UPDATE mahasiswa SET nama_mahasiswa='$input_nama', prodi='$input_prodi'
			WHERE nim='$input_nim'";

			$result = mysqli_query($link, $query);
			if ($result){
				header('location: index.php');
			} else{
				echo 'Gagal disimpan :' . mysqli_error($link);
			}
        }
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="">NIM</label>
                <input type="text" class="form-control" name="txtnim" value="<?= $isi->nim; ?>">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="txtnama_mahasiswa" value="<?= $isi->nama_mahasiswa; ?>">
            </div>
            <div class="form-group">
                <label for="">Prodi</label>
                <input type="text" class="form-control" name="txtprodi" value="<?= $isi->prodi; ?>">
            </div>
        
            <input type="submit" class="btn btn-primary" name="update" 
                        value="Edit Data">
            <a href="index.php" class="btn btn-warning">Batal</a>
            

        </form>
    </div>

</body>
</html>