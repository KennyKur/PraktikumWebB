<?php 
	include "config.php";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$user_password = $_POST['password'];
		$sql = "SELECT * FROM user  WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
		$password = $data['password'];
		$status = $data['status'];
		if($user_password == $password)
		{
			session_start();
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			if($_SESSION['status'] == "user")
			{
				header("location:user/index.php");
			}
			else{
				header("location:admin/index.php");
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Website Perpustakaan Buku</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="sidebar">
		<div class="logo">
			<img src="img/unud.png">
		</div>
		<div class="sidebar-link">
			<a href="index.php" style="text-decoration: none;"><h5>Home</h5></a>
		</div>
		<div class="sidebar-link">
			<a href="tentang.php" style="text-decoration: none;"><h5>Tentang</h5></a>
		</div>
		<div class="sidebar-link">
			<a href="galeri_buku.php" style="text-decoration: none;"><h5>Galeri Buku</h5></a>
		</div>
		<div class="sidebar-link">
			<a href="kontak.php" style="text-decoration: none;"><h5>Kontak</h5></a>
		</div>
		<div style="text-align: center;">
			<h5>Login sebagai : <br> Kenny Kurniadi <br>User</h5>
		</div>
		<br>
	</div>
	<div class="main">
		<div class="judul" style="background-image: url(img/kantor.jpg); background-size: 1040px 300px;">
		</div>
		<br>
		<div class="content">
			<h1>Login</h1>
			<p align="justify">
				<form method="POST" action="index.php">
					<p>username : </p>
					<input type="text" name="username" id="">
					<p>password :</p>
					<input type="password" name="password">
					<button type="submit" name="submit" value="submit">Login</button>
				</form>
			</p>
			<p>untuk admin (username = admin, password = admin)</p>
			<p>untuk user (username = user, password = user)</p>
		</div>
	</div>
</div>
<div class="footer">
	<small>© 2016 USDI -  Universitas Udayana</small><br>
	<small>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</small>
</div>
</body>
</html>