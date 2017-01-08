<div class="wrapper">
	<!-- navbar Top -->
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
				<a class="navbar-brand" href="admin.php">Gudang PT Meitan-X Technology</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<!-- <li class="active"><a href="#">Link</a></li>
					<li><a href="#">Link</a></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../model/Logout.php">Log Out   <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
		<!-- nav left -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav in" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element"> 
							<span>
								<!-- <img alt="image" class="img-circle" src="../images/profil/i.jpg"> -->
								<div>
									<p>
										<i class="fa fa-user fa-5x"></i>
									</p>
								</div>
							</span>
							<a data-toggle="dropdown" class="" href="#" aria-expanded="false">
								<span class="clear"> 
									<span class="block m-t-xs"> 
										<strong class="font-bold"><?php echo $data['nama_user']; ?></strong>
									</span>
									<span class="text-muted text-xs block">Admin <b class="caret"></b></span> 
								</span>
							</a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="#">Profile</a></li>
								<li><a href="../model/Logout.php">Logout</a></li>
							</ul>
						</div>
					</li>
					<li class="">
						<a href="admin.php">
							<i class="fa fa-th-large"></i>
							<span class="nav-label">Dashboards</span> 
						</a>
				</li>
				<li class="">
					<a href="#">
						<i class="fa fa-bar-chart-o"></i> 
						<span class="nav-label">Barang</span>
						<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
						<li>
							<a href="barang.php">List Barang</a>
						</li>
						<li>
							<a href="barang_insert.php">Tambah Barang</a>
						</li><!-- 
						<li>
							<a href="#">Tambah Barang</a>
						</li> -->
					</ul>
				</li>
				<li class="">
					<a href="#">
						<i class="fa fa-bar-chart-o"></i> 
						<span class="nav-label">Kategori Barang</span>
						<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
						<li>
							<a href="barang_kategori.php">List Kategori</a>
						</li>
						<li>
							<a href="barangkategori_insert.php">Tambah Kategori</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="barangmasuk.php">
						<i class="fa fa-arrow-circle-down"></i>
						<span class="nav-label">Barang Masuk </span>
					</a>
				</li>
				<li>
					<a href="barangkeluar.php">
						<i class="fa fa-external-link"></i> 
						<span class="nav-label">Barang Keluar</span>  
					</a>
				</li>
				<li>
					<a href="user.php">
						<i class="fa fa-user"></i>
						<span class="nav-label">User</span>
					</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-files-o fa-fw"></i> Rak<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
						<li>
							<a href="rak.php">List Rak</a>
						</li>
						<li>
							<a href="rak_insert.php">Tambah Rak</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
</nav>