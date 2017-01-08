<?php 
include ('model/Login.php');

?>
<!DOCTYPE html>
<html lang="">
<head>
	<title>Gudang</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="bs/css/animate.css">
	<link rel="stylesheet" href="bs/css/compiled.min.css">
	<link rel="stylesheet" href="bs/css/font-awesome.min.css">
	<link rel="stylesheet" href="bs/css/styles.css">
</head>
<body class="bg-image">
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 panel-login">
				<form action="" method="POST">
					<div class="card animated bounceInDown">
						<div class="card-block">

							<!--Header-->
							<div class="text-xs-center">
								<h3><i class="fa fa-lock"></i> Login</h3>
								<hr class="mt-2 mb-2">
							</div>

							<!--Body-->
							<div class="md-form">
								<i class="fa fa-user prefix"></i>
								<input type="text" id="form2" class="form-control" name="username" placeholder="Username">
								<!-- <label for="form2">Username</label> -->
							</div>

							<div class="md-form">
								<i class="fa fa-lock prefix"></i>
								<input type="password" id="form4" class="form-control" name="password" placeholder="Password">
								<!-- <label for="form4">Password</label> -->
							</div>

							<div class="md-form">
								<i class="fa fa-lock prefix"></i>
								<!-- <input type="password" id="form4" class="form-control" name="password" placeholder="Password"> -->
								<select name="level" id="form3" class="form-control md-select" required="required" type="select">
									<option value="admin">Admin</option>
									<option value="user">User</option>
								</select>
								<!-- <label for="form4">Password</label> -->
							</div>

							<div class="text-xs-center">
								<input type="submit" name="submit" class="btn btn-deep-purple" value="Login">
							</div>

						</div>

						<!--Footer-->
					<!-- <div class="modal-footer">
						<div class="options">
							<p>Not a member? <a href="#">Sign Up</a></p>
							<p>Forgot <a href="#">Password?</a></p>
						</div>
					</div> -->

				</div>
			</form>
		</div>
		<div class="col-lg-3"></div>
	</div>


	<!-- jQuery -->
	<script src="bs/js/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="bs/js/bootstrap.min.js"></script>
</body>
</html>