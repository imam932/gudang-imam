<?php 
session_start();
include ("../model/admin.php");
include ("../model/Model_penampungan.php");
include ("../model/Model_report.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<?php 
	include ("../asset/csslink.php");
	?>
</head>
<body class="admin">
	<?php 
	include ("navbar.php");
	$penampungan = new Model_penampungan("localhost","root", "", "gudang");
	$report = new Model_report("localhost","root", "", "gudang");
	// print_r($penampungan->readpenampungan());
	$data 		= $penampungan->readpenampungan();
	$data_rep	= $report->readreport();
	?>
	<!-- navbar Left-->
	<div id="page-wrapper" style="min-height: 393px;">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-4 col-md-12">
				<div class="panel panel-barang">
					<div class="panel panel-green">
						<div class="panel-heading">
							<h4><i class="fa fa-tasks"></i> Barang Masuk</h4>
						</div>
							<div class="panel-body">
								<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Suplier</th>
											<th>Jumalah Unit</th>
											<th>Tanggal Masuk</th>
											<th>Nama Barang</th>
										</tr>
									</thead>

									<tbody>
										<!-- mengambil dari query barang -->
										<?php foreach ($data as $key) { ?>
										<tr>
											<td><?php echo $key[1]; ?></td>
											<td><?php echo $key[2]; ?></td>
											<td><?php echo $key[3]; ?></td>
											<td><?php echo $key[4]; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-12">
				<div class="panel panel-barang">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4><i class="fa fa-inbox"></i> Dalam Gudang</h4>
						</div>
							<div class="panel-body">
								<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Barang</th>
											<th>Jumalah Normal</th>
											<th>Kategori</th>
											<th>Rak</th>
										</tr>
									</thead>
									<tbody>
										<!-- mengambil dari query barang -->
										<?php foreach ($query_b as $key => $value) { ?>
										<tr>
											<td><?php echo $value['nama_barang']; ?></td>
											<td><?php echo $value['jml_normal']; ?></td>
											<td><?php echo $value['id_kategori']; ?></td>
											<td><?php echo $value['id_rak']; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-12">
				<div class="panel panel-barang">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<h4><i class="fa fa-sign-out"></i> Pemakaian Barang</h4>
						</div>
							<div class="panel-body">
								<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Di Pakai</th>
											<th>User</th>
											<th>Barang</th>
											<th>Tanggal Ambil</th>
										</tr>
									</thead>
									<tbody>
										<!-- mengambil dari query barang -->
										<?php foreach ($data_rep as $key => $value) { ?>
										<tr>
											<td><?php echo $value[1]; ?></td>
											<td><?php echo $value[2]; ?></td>
											<td><?php echo $value[3]; ?></td>
											<td><?php echo $value[4]; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>

		<!-- /.panel-heading -->
		<!-- <div class="panel-body">
			
		</div> -->

	</div>
	<!-- /.panel-body -->


<?php 
include ("../asset/jslink.php");
?>
</body>
</html>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
		$('#example1').DataTable();
		$('#example2').DataTable();
	} );
</script>