<?php
include "../php/config.php";?>
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
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white">Perpus-GO<span>Perpustakaan Online</span></h1>
                <p class="lead  text-white">Anda dapat meminjam Buku Online disini</p>
                <div class="btn-wrapper">
                  <a href="list.php" class="btn btn-info btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--text">Lihat list buku</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <?php $sql = "SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id" ;
              $datas = queryMultiple($sql);
              foreach($datas as $row)
              {
                ?>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5 text-center">
                    <img src="../uploads/<?=$row['thumbnail']?>" alt="" style="max-height:200px; width:auto;">
                    <h6 class="text-primary text-uppercase"><?=$row['nama']?></h6>
                    <p class="description mt-3"><?=$row['stok']?> Buku tersedia</p>
                    <div>
                      <span class="badge badge-pill badge-primary"><?=$row['kategori']?></span>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Lihat Detail</a>
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