<?php 
include("../model/Model_barang.php");

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
	$kat_barang = new Model_barang("localhost","root", "", "gudang");
	// print_r($kat_barang->readbarangkategori());
	$data = $kat_barang->readbarangkategori();
	?>

	<div id="page-wrapper" style="min-height: 393px;">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Kategori Barang</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-3 col-md-6">
			</div>

			<div class="col-lg-6 col-md-6">
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
									<h3>Kategori Barang</h3>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID Kategori Barang</th>
										<th>Nama Kategori Barang</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									<!-- mengambil dari query barang -->
									<?php foreach ($data as $key) { ?>
									<tr>
										<td><?php echo $key[0]; ?></td>
										<td><?php echo $key[1]; ?></td>
										<td>
											<a href="barangkategori_edit.php?id=<?php echo $key[0]; ?>">
												<i class="fa fa-pencil"></i> 
											</a>
											<a href="barangkategori_delete.php?id=<?php echo $key[0]; ?>">
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

			<div class="col-lg-3 col-md-6">
			</div>
			<div class="fixed-action-btn" style="bottom: 368px; right: 24px;">
				<a href="barangkategori_insert.php" class="btn-floating btn-large red waves-effect waves-light">
					<i class="fa fa-plus"></i>
				</a>

				<!-- <ul>
					<li><a class="btn-floating red waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-star"></i></a></li>
					<li><a class="btn-floating yellow darken-1 waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-user"></i></a></li>
					<li><a class="btn-floating green waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-envelope"></i></a></li>
					<li><a class="btn-floating blue waves-effect waves-light" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;"><i class="fa fa-shopping-cart"></i></a></li>
				</ul> -->
			</div>
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