<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Dosen</title>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
    

</head>
<body>

	<!-- Dosen -->
	<div class="container">
		<div class="alert alert-info">Edit Data Dosen</div>

        <?php
        require'../koneksi.php';

        // $nip = $_POST['nip'];
        // $nama_dosen = $_POST['nama_dosen'];
        // $alamat = $_POST['alamat'];

        // mysqli_query($link, "UPDATE dosen SET nama_dosen='$nama_dosen', alamat='$alamat'");
        // header("location: index.php");

        if (isset($_POST['edit'])) {
            $input_nip = $_POST['txtnip'];
            $input_nama = $_POST['txtnama'];
            $input_alamat = $_POST['txtalamat'];

            $query = "UPDATE dosen SET nama_dosen='$input_nama', alamat='$input_alamat'
			WHERE nip='$input_nip'";

            $result = mysqli_query($link, $query);
            if ($result){
                // location: no location :
                header('location: index.php');
            }else{
                echo 'Gagal Disimpan : ', mysqli_error($link);
            }
        }
        if(!empty($_GET['nip'])){
             $sqli = mysqli_query($link, "SELECT * FROM dosen WHERE nip ={$_GET['nip']}");
             
             $isi = mysqli_fetch_object($sqli);
        }
        
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="">NIP</label>
                <input type="text" class="form-control" name="txtnip" value="<?= $isi->nip; ?>">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="txtnama" value="<?= $isi->nama_dosen; ?>">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" name="txtalamat" value="<?= $isi->alamat; ?>">
            </div>
        
            <input type="submit" class="btn btn-primary" name="edit" 
                        value="Edit Data">
            <a href="index.php" class="btn btn-warning">Batal</a>
            

        </form>
    </div>

</body>
</html>