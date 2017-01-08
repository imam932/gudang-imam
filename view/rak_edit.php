<?php 
session_start();
include("../model/Model_rak.php");

$rak = new Model_rak("localhost","root", "", "gudang");
$data_user = $rak->getuser();
		// print_r($data_user);

if (isset($_REQUEST['simpan'])) {
	$nama_rak 		= $_POST['nama_rak'];
	$jumlah_tampung	= $_POST['jumlah_tampung'];
	$nama_user 		= $_POST['nama_user'];

	extract($_REQUEST);

	$rak->updaterak($nama_rak,$jumlah_tampung,$nama_user);
}

$id=$_REQUEST['id'];
$result=$rak->mysqli->query("SELECT * FROM rak where id_rak='$id'");

$rows=$result->fetch_assoc();

	// print_r($rows);
extract($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Rak</title>
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
						<legend>Update Rak</legend>
						<div class="panel-body">

							<div class="form-group">
								<input type="text" name="nama_rak" class="form-control" value="<?php echo $nama_rak; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="jumlah_tampung" class="form-control" value="<?php echo $jumlah_tampung; ?>">
							</div>
							<div class="form-group">
								<select class="form-control" name="nama_user" value="<?php echo $nama_user; ?>">
									<option value="">Nama admin</option>
									<?php 
									foreach ($data_user as $key) {
										extract($key);
										?>
										<option value="<?php echo $key[1]; ?>"><?php echo $key[1]; ?></option>
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