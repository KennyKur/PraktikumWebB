<?php

include "../php/config.php";
if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users(email,password,status) VALUES ('$email','$password',1)";
  if(mysqli_query($conn,$sql))
  {
    $last_id = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO detail_users(user_id,nama,no_telp,alamat,jenis_kelamin) VALUES('$last_id','$nama','$no_telp','$alamat','$jenis_kelamin')";
    $result = mysqli_query($conn,$sql2);
    header("location: login.php");
  }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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
		<div class="shape shape-style-1 bg-gradient-default min-vh-100">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="container pt-lg-2">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-3">
							<div class="text-center text-muted mb-4">
								<small>Sign Up</small>
							</div>
							<form class="form-signin" method="post" id="register-form" action="register.php">

								<!-- <h2 class="form-signin-heading">Sign Up</h2> -->
								<!-- <hr /> -->

								<div id="error">
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input type="email" class="form-control" placeholder="Email address" name="email" id="email">
										<span id="check-e"></span>
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
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text">
										</div>
										<input type="text" class="form-control" placeholder="Nama" name="nama" >
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text">
										</div>
										<input type="text" class="form-control" placeholder="alamat" name="alamat" >
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"></span>
										</div>
										<input type="text" class="form-control" placeholder="Nomor Telepon" name="nomor_telp" >
									</div>
								</div>
								<div class="custom-control custom-radio mb-3">
									<input name="jenis_kelamin" value="laki_laki" class="custom-control-input" id="customRadio1" 	type="radio">
									<label class="custom-control-label" for="customRadio1">Laki-laki</label>
								</div>
								<div class="custom-control custom-radio mb-3">
									<input name="jenis_kelamin" value="perempuan" class="custom-control-input" id="customRadio2" 	type="radio">
									<label class="custom-control-label" for="customRadio2">Perempuan</label>
								</div>
								<hr />
								<div class="form-group text-center">
									<button type="submit" name="submit" value="submit" id="btn-submit" class="btn btn-primary">Create account</button>
									<!-- <button class="btn btn-default w-100" type="submit" name="btn-save" id="btn-submit">
										Create Account
									</button> -->
								</div>
							</form>
						</div>
					</div>
					<div id="result"></div>
					<div class="row mt-3">
						<div class="col-12 text-right">
							<a href="login.php" class="text-light"><small>Already Have an Account?</small></a>
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
	<script src="/../assets/js/argon.min.js"></script>
</body>

</html>