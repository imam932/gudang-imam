<?php 
session_start();
include("../model/Model_barang.php");

$barang = new Model_barang("localhost","root", "", "gudang");
	// print_r($barang->getkategori());
$data_kat = $barang->getkategori();
$data_rak = $barang->getrak();



if (isset($_REQUEST['simpan'])) {
$nama_barang	= $_POST['nama_barang'];
$jml_normal		= $_POST['jml_normal'];
$jml_diperbaiki	= $_POST['jml_diperbaiki'];
$jml_rusak		= $_POST['jml_rusak'];
$id_kategori	= $_POST['id_kategori'];
$id_rak			= $_POST['id_rak'];

	extract($_REQUEST);

	$barang->updatebarang($nama_barang,$jml_normal,$jml_diperbaiki,$jml_rusak,$id_kategori,$id_rak);
}

$id=$_REQUEST['id'];
$result=$barang->mysqli->query("SELECT * FROM barang where id_barang='$id'");

$rows=$result->fetch_assoc();

	// print_r($rows);
extract($rows);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Barang</title>
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
						<legend>Insert Barang</legend>
						<div class="panel-body">

							<div class="form-group">
								<input type="text" name="nama_barang" class="form-control" value="<?php echo $nama_barang; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="jml_normal" class="form-control" value="<?php echo $jml_normal; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="jml_diperbaiki" class="form-control" value="<?php echo $jml_diperbaiki; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="jml_rusak" class="form-control" value="<?php echo $jml_rusak; ?>">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_kategori" value="<?php echo $nama_kategori; ?>">
									<option value="">Kategori</option>
									<?php 
									foreach ($data_kat as $key) {
										extract($key);
										?>
										<option value="<?php echo $key[0]; ?>"><?php echo $key[1]; ?></option>
										<?php 
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="id_rak" value="<?php echo $nama_rak; ?>">
									<option value="">Rak</option>
									<?php 
									foreach ($data_rak as $key) {
										extract($key);
										?>
										<option value="<?php echo $key[0]; ?>"><?php echo $key[1]; ?></option>
										<?php 
									}
									?>
								</select>
							</div>

							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<button onclick="history.go(-1);" class="btn btn-warning">Batal</button>
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