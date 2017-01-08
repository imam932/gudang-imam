<?php 
session_start();
include("../model/Model_barang.php");
$kat_barang = new Model_barang("localhost","root", "", "gudang");

if (isset($_REQUEST['simpan'])) {
	$nama_kategori 		= $_POST['nama_kategori'];

	extract($_REQUEST);

	$kat_barang->updatekategori($nama_kategori);
}


$id=$_REQUEST['id'];
$result=$kat_barang->mysqli->query("SELECT * FROM kategori_barang where id_kategori='$id'");

$rows=$result->fetch_assoc();

	// print_r($rows);
extract($rows);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Kategori Barang</title>
	<?php 
	include("../asset/csslink.php");
	?>
</head>
<body class="admin">
	<?php 
	include ("navbar_admin.php");
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

				<form action="" method="POST" role="form">

					<div class="panel panel-default">
						<legend>Edit Kategori Barang</legend>
						<div class="panel-body">

							<div class="form-group">
								<input type="text" name="nama_kategori" class="form-control" id="" value="<?php echo $nama_kategori; ?>">
							</div>
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<button onclick="history.go(-1);" class="btn btn-warning">Batal</button>
							<input type="hidden" name="id" value="<?php echo $id; ?>">
						</div>
					</div>
				</form>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				
			</div>
		</div>
	</div>

	<?php 
	include("../asset/jslink.php");
	?>
</body>
</html>