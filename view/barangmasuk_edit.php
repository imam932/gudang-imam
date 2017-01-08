<?php 
session_start();
include ("../model/Model_penampungan.php");

$brg_masuk = new Model_penampungan("localhost","root", "", "gudang");
$data_sup = $brg_masuk->getsupplier();
$data_brg = $brg_masuk->getbarang();
// print_r($data_sup);

if (isset($_REQUEST['simpan'])) {
	$id_supplier	= $_POST['id_supplier'];
	$jumlah_unit	= $_POST['jumlah_unit'];
	$tgl_masuk		= $_POST['tgl_masuk'];
	$id_barang		= $_POST['id_barang'];
	$status			= $_POST['status'];

	extract($_REQUEST);

	$brg_masuk->updatepenampungan($id_supplier,$jumlah_unit,$tgl_masuk,$id_barang,$status);
}

$id = $_REQUEST['id'];
$result = $brg_masuk->mysqli->query("
			SELECT * FROM penampungan as pe
			inner join barang as brg 
			on pe.id_barang = brg.id_barang
			inner join supplier as su
			on pe.id_supplier = su.id_supplier
			where id_penampungan = '$id'
			");
$rows = $result->fetch_assoc();
// print_r($rows);
extract($rows);
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Barang Masuk</title>
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
						<legend>Insert Barang Masuk</legend>
						<div class="panel-body">

							<div class="form-group">
								<select class="form-control" name="id_supplier">
									<option value="<?php echo $id_supplier; ?>"><?php echo $nama_supplier; ?></option>
									<?php 
									foreach ($data_sup as $key) {
										extract($key);
										?>
										<option value="<?php echo $key[0]; ?>"><?php echo $key[1]; ?></option>
										<?php 
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<input type="text" name="jumlah_unit" class="form-control" value="<?php echo $jumlah_unit; ?>">
							</div>
							<div class="form-group">
								<input type="text" name="tgl_masuk" id="datetimepicker" class="form-control" data-date-format="yyyy-mm-dd hh:ii" value="<?php echo $tgl_masuk; ?>">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_barang">
									<option value="<?php echo $id_barang; ?>"><?php echo $nama_barang; ?></option>
									<?php 
									foreach ($data_brg as $key) {
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
									<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
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
	<script type="text/javascript">
		$('#datetimepicker').datetimepicker();
	</script>
</body>
</html>