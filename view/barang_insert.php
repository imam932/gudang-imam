<?php 
session_start();
ob_start();
include("../model/Model_barang.php");

$barang = new Model_barang("localhost","root", "", "gudang");
	// print_r($barang->getkategori());
$data_kat = $barang->getkategori();
$data_rak = $barang->getrak();

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
								<input type="text" name="nama_barang" class="form-control" id="" placeholder="Nama Barang">
							</div>
							<div class="form-group">
								<input type="text" name="jml_normal" class="form-control" id="" placeholder="Jumlah Barang Normal">
							</div>
							<div class="form-group">
								<input type="text" name="jml_diperbaiki" class="form-control" id="" placeholder="Jumlah Barang Diperbaiki">
							</div>
							<div class="form-group">
								<input type="text" name="jml_rusak" class="form-control" id="" placeholder="Jumlah Barang Rusak">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_kategori">
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
								<select class="form-control" name="id_rak">
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
							<div class="form-group">
								<select class="form-control" name="status">
									<option value="">Pilih Status Barang</option>
									<option value="penampungan">Di Penampungan</option>
									<option value="gudang">Di Gudang</option>
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
<?php 
	if (isset($_REQUEST['simpan'])) {
		
		
		extract($_REQUEST);

		$barang->insertbarang($nama_barang,$jml_normal,$jml_diperbaiki,$jml_rusak,$nama_kategori,$nama_rak);
	}
 ?>