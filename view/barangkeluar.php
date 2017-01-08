<?php 
include("../model/Model_barang.php");
include("../model/Model_report.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>kategori Barang</title>
	<?php 
	include("../asset/csslink.php");
	?>
</head>
<body class="admin">
	<?php 
	include ("navbar.php");
	$rep_barang = new Model_report("localhost","root", "", "gudang");
	$data = $rep_barang->readreport();
	// print_r($data);
	?>

	<div id="page-wrapper" style="min-height: 393px;">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengambilan Barang</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-barang">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<div> 
										<i class="fa fa-tasks fa-5x"></i> 
									</div>
								</div>
								<div class="col-xs-12 text-center">
									<h3>Pengambilan Barang</h3>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID Pengambilan Barang</th>
										<th>Keperluan</th>
										<th>Nama User</th>
										<th>nama Barang</th>
										<th>Jumalah Pengambilan</th>
										<th>Tanggal Pengambilan</th>
										<th>Keterangan</th>
										<!-- <th>Aksi</th> -->
									</tr>
								</thead>

								<tbody>
									<!-- mengambil dari query -->
									<?php foreach ($data as $key) { ?>
									<tr>
										<td><?php echo $key[0]; ?></td>
										<td><?php echo $key[1]; ?></td>
										<td><?php echo $key[8]; ?></td>
										<td><?php echo $key[16]; ?></td>
										<td><?php echo $key[4]; ?></td>
										<td><?php echo $key[5]; ?></td>
										<td><?php echo $key[6]; ?></td>
										<td>
												<!-- <a href="barangkeluar_edit.php?id=<?php echo $key[0]; ?>">
													<i class="fa fa-pencil"></i> 
												</a> -->
												<a href="barangkeluar_delete.php?id=<?php echo $key[0]; ?>">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="fixed-action-btn" style="bottom: 368px; right: 24px;">
					<a href="barangkeluar_insert.php" class="btn-floating btn-large red waves-effect waves-light">
						<i class="fa fa-plus"></i>
					</a>
				</div>
				<a href="laporan/lap_barangkeluar.php" class="btn btn-primary right">
					<i class="fa fa-print"></i>
				</a>
			</div>
		</div>
		
		<?php 
		include("../asset/jslink.php");
		?>
	</body>
	</html>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>