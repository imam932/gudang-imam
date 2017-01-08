<?php 
session_start();
ob_start();
include("../model/Model_barang.php");
include("../model/Model_report.php");
$report = new Model_report("localhost","root", "", "gudang");
	$data_usr = $report->getuser();
	$data_brg = $report->getbarang();
	// print_r($data_usr);
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
						<legend>Tambah Pengaambilan Barang</legend>
						<div class="panel-body">

							<div class="form-group">
								<input type="text" name="nama_report" class="form-control" id="" placeholder="Keperluan">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_user">
									<option value="">Pilih User</option>
									<?php 
									foreach ($data_usr as $key) {
										extract($key);
										?>
										<option value="<?php echo $key[0]; ?>"><?php echo $key[1]; ?></option>
										<?php 
									}
										?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="id_barang">
									<option value="">Pilih Barang</option>
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
								<input type="text" name="jumlah" class="form-control" id="" placeholder="Jumlah Barang">
							</div>
							<div class="form-group">
								<input type="text" name="tgl_report" id="datetimepicker" class="form-control" data-date-format="yyyy-mm-dd hh:ii" value="<?= date('Y-m-d')?>">
							</div>
							<div class="form-group">
								<textarea type="text" name="isi_report" id="inputIsi_report" class="form-control" rows="3" required="required" placeholder="Keterangan Pengambilan.."></textarea>
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
		
		$report = new Model_report("localhost","root", "", "gudang");

		extract($_REQUEST);

		$report->insertreport($nama_report,$id_user,$id_barang,$jumlah,$tgl_report,$isi_report);
	}
 ?>