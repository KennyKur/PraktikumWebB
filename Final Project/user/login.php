<?php
include "../php/config.php";
if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$user_password = mysqli_real_escape_string($conn, $_POST['password']);
	$sql = "SELECT * FROM users where email='$email'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	$password = $data['password'];
	$status = $data['status'];
	$id = $data['id'];
	if ($user_password == $password) {
			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['id'] = $id;
			if ($status == 1) {
				$_SESSION['status'] = $status;
				header("location:index.php");
			} else if ($status == 2) {
				$sql = "SELECT * FROM detail_admin where user_id='$id'";
				$data_admin = mysqli_fetch_assoc(mysqli_query($conn, $sql));
				$_SESSION['status'] = $status;
				$_SESSION['id_admin'] = $data_admin['id'];
				header("location:../admin/");
			} else if ($status == 3) {
				$_SESSION['status'] = $status;
				header("location:../superadmin/");
			}
	}
	else{
		echo"gagal";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Design System for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Perpus-GO</title>
	<!-- Favicon -->
	<link href="../assets/img/brand/fav.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Argon CSS -->
	<link type="text/css" href="../assets/css/argon.min.css?v=1.1.0" rel="stylesheet">
</head>

<body>
	<?php include("navbar.php") ?>
	<section class="section section-shaped section-lg">
		<div class="shape shape-style-1 bg-gradient-default h-100vh">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="container pt-lg-md">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-3">
							<div class="text-center text-muted mb-4">
								<small>Or sign in with credentials</small>
							</div>
							<form class="form-signin" method="post" action="login.php" id="login-form">
								<div id="error">
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-hat-3"></i></span>
										</div>
										<input type="email" class="form-control" placeholder="email" name="email" id="email">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input type="password" class="form-control" placeholder="Password" name="password" id="password">
									</div>
								</div>
								<hr />

								<div class="form-group text-center">
									<button type="submit" value="submit" name="submit" id="btn-submit" class="btn btn-primary">Sign In</button>
								</div>
							</form>
							<div class="row mt-3">
								<div class="col-6 text-right">
									<a href="register.php" class="text-light"><small>Create new account</small></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Core -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/popper/popper.min.js"></script>
	<script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
	<!-- Theme JS -->
	<!-- <script src="../assets/js/argon.min.js"></script> -->
</body>
</html>