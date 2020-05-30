<?php
include "../php/config.php";

if(isset($_GET['kategori']))
{
  $kategori =$_GET['kategori'];
  $sql1 = "SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id WHERE kategori.nama = '$kategori'" ;
}
else if(isset($_GET['cari']))
{
  $cari =$_GET['cari'];
  $sql1 = "SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id WHERE buku.nama LIKE'%$cari%' " ;
}
else{
  $sql1 = "SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id" ;
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
    <section class="section section-lg pt-lg-0 bg-gradient-green mt--100">
      <div class="container">
        <div style="padding-top: 250px;" class="row justify-content-center">
          
          <div class="col-lg-12">
            <div class="row row-grid">
              <?php
              $datas = queryMultiple($sql1);
              foreach($datas as $row)
              {
                ?>
              <div style="margin-bottom:40px" class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5 text-center">
                    <img src="../uploads/<?=$row['thumbnail']?>" alt="" style="max-height:200px; width:auto;">
                    <h6 class="text-primary text-uppercase"><?=$row['nama']?></h6>
                    <p class="description mt-3"><?=$row['stok']?> Buku tersedia</p>
                    <div>
                      <span class="badge badge-pill badge-primary"><?=$row['kategori']?></span>
                    </div>
                    <a href="detail_buku.php?<?php echo"id=".$row['id'];?> " class="btn btn-primary mt-4">Lihat Detail</a>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/popper/popper.min.js"></script>
	<script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
</body>