<?php 
include "../config.php";
if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $status = $_SESSION['status'];
}
else{
	header("location:../index.php");
}
if(isset($_GET['act']))
{
	session_destroy();
	header("location:../index.php");
}
?>

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
		<h5>Login sebagai : <br> <?=$nama?><br>status (<?=$status?>)</h5>
	</div>
	<div class="sidebar-link">
		<a href="navbar.php?act=logout" style="text-decoration: none;"><h5>Logout</h5></a>
	</div>
	<br>
</div>