<?php 
session_start();

	$nama = $_SESSION["nama_user"];
	echo $nama;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<?php 
	include ("../asset/csslink.php");
	include("../model/Login.php");
	// include('../model/user.php');

	?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">PT Meitan-X Technology</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><?php echo $data['nama_user']; ?></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="col-lg-12 col-md-6">
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
								<h3>Barang</h3>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID Barang</th>
									<th>Nama Barang</th>
									<th>Jumalah Normal</th>
									<th>Jumlah Diperbaiki</th>
									<th>Jumlah Rusak</th>
									<th>Kategori Barang</th>
									<th>ID Rak</th>
								</tr>
							</thead>

							<tbody>
								<!-- mengambil dari query barang di user -->
								<?php foreach ($db_user->data_barang as $key) { ?>
								<tr>
									<td><?php echo $key['id_barang']; ?></td>
									<td><?php echo $key['nama_barang']; ?></td>
									<td><?php echo $key['jml_normal']; ?></td>
									<td><?php echo $key['jml_diperbaiki']; ?></td>
									<td><?php echo $key['jml_rusak']; ?></td>
									<td><?php echo $key['id_kategori']; ?></td>
									<td><?php echo $key['id_rak']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php 
	include ("../asset/jslink.php");
	?>
</body>
</html>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>