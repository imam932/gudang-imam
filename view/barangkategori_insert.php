<?php 
session_start();
include("../model/Model_barang.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Kategori Barang</title>
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
						<legend>Update Kategori Barang</legend>
						<div class="panel-body">

							<div class="form-group">
								<input type="text" name="nama_kategori" class="form-control" id="" placeholder="Nama Kategori Barang">
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
		
		$kat_barang = new Model_barang("localhost","root", "", "gudang");

		extract($_REQUEST);

		$kat_barang->insertkategori($nama_kategori);
	}
 ?>