<?php 
session_start();
ob_start();
include("../model/Model_penampungan.php");

$penampungan = new Model_penampungan("localhost","root", "", "gudang");
	$data_sup = $penampungan->getsupplier();
	$data_brg = $penampungan->getbarang();

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
									<option value="">Supplier</option>
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
								<input type="text" name="jumlah_unit" class="form-control" id="" placeholder="Jumlah Unit">
							</div>
							<div class="form-group">
								<input type="text" name="tgl_masuk" id="datetimepicker" class="form-control" data-date-format="yyyy-mm-dd hh:ii" value="<?= date('Y-m-d')?>">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_barang">
									<option value="">Barang</option>
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
	<script type="text/javascript">
		$('#datetimepicker').datetimepicker();
	</script>
</body>
</html>
<?php 
	if (isset($_REQUEST['simpan'])) {
		
		
		extract($_REQUEST);

		$penampungan->insertpenampungan($id_supplier,$jumlah_unit,$tgl_masuk,$id_barang,$status);
	}
 ?>