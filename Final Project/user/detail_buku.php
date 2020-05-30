<?php
include "../php/config.php";

if(isset($_GET['id']))
{
  $id =$_GET['id'];
  $sql1 = "SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id WHERE buku.id = '$id'" ;
  $datas = queryFetch($sql1);
}
if(isset($_POST['submit']))
{
  if(isset($_SESSION['id']))
  {
    $buku_id = $_POST['buku_id'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $user_id = $_SESSION['id'];
    $sql1 = "INSERT INTO pinjam_buku(user_id, buku_id, waktu_pinjam, waktu_kembali) VALUES('$user_id','$buku_id','$tanggal_mulai','$tanggal_kembali')" ;
    mysqli_query($conn,$sql1);
    header("location: index.php");
  }
  else{
    header("location: login.php");
  }
}
  
?>
<!DOCTYPE html>
<html lang="en">

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
<body>
    <?php include("navbar.php") ?>
    <main>
    <section class="section section-lg pt-lg-0 bg-gradient-green">
    <div class="container">
		<div class="row">
			<div style="padding-top:100px" class="col-8">
				<div class="shadow bg-white rounded mt-3 p-3 box1">
					<img src="../uploads/<?= $datas['thumbnail'] ?>" class="img-fluid img rounded float-left mr-3 mb-3" alt="Responsive image" style="height: 250px; margin-right:20px">
					<p class="text-left float-left">
						<h3><?= $datas['nama'] ?></h3>
					</p>
					<p class="text-left float-left">
          <h3 class="text-success font-weight-bold">Author :<?= $datas['author'] ?></h3>
						<h3 class="text-success font-weight-bold">Stok :<?= $datas['stok'] ?></h3>
					</p>
					<form method="post" action="detail_buku.php">
          <input type="hidden" name="buku_id" value="<?= $datas['id'] ?>">
          <div class="input-daterange datepicker row align-items-center">
              <div class="col">
                  <div class="form-group">
                      <p>tanggal mulai</p>
                      <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input class="form-control" name="tanggal_mulai" placeholder="Start date" type="text" value="2020-10-06">
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <p>tanggal kembali</p>
                      <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input class="form-control" name="tanggal_kembali" placeholder="End date" type="text" value="2020-10-12">
                      </div>
                  </div>
              </div>
            </div>
						<button type="submit" name="submit" value="submit" class="btn btn-success btn-lg btn-block">PINJAM SEKARANG</button>
						<!-- <button type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg btn-block">TAMBAH KE KERANJANG</button> -->
					</form>
				</div>
				<div class="shadow bg-white rounded mt-3 mb-5 p-3 box3">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-success active">
							<input type="radio" name="options" id="option1" autocomplete="off" checked> Detail Barang
						</label>
					</div>
					<table class="table table-borderless table-responsive">
						<tr>
							<th scope="row">INFORMASI</th>
							<td><i class="fa fa-shopping-cart"></i></td>
							<td>Dipinjam</td>
							<td>:</td>
							<td>36</td>
						</tr>
						<tr>
							<th></th>
							<td><i class="fa fa-heart"></i></td>
							<td>Disukai</td>
							<td>:</td>
							<td>56</td>
						</tr>
						<tr>
							<th></th>
							<td><i class="fas fa-upload"></i></td>
							<td>Diperbaharui</td>
							<td>:</td>
							<td>12 Mei 2019</td>
						</tr>
					</table>
					<!-- <div class="p-3">
						<h4 class="font-weight-bold">Deskripsi</h4>
						<p class="pl-5 text-justify">
							<?= $datas['deskripsi'] ?>
						</p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
    </section>
  </main>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/popper/popper.min.js"></script>
  <script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
</body>