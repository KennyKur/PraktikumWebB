<?php

include '../php/config.php';
if(isset($_POST['submit']))
{
  $nama = $_POST['nama'];
  $nomor_rak = $_POST['nomor_rak'];
  $sql = "INSERT INTO kategori(nama,nomor_rak) VALUES ('$nama','$nomor_rak')";
  if(mysqli_query($conn,$sql))
  {
    header("location: kategori.php");
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengaturan Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="buku.php" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                &nbsp;&nbsp;Pengaturan Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link">
              <i class="fas fa-book"></i> 
              <p>
                &nbsp;&nbsp;Pengaturan Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pinjam_buku.php" class="nav-link">
              <i class="fas fa-book"></i> 
              <p>
                &nbsp;&nbsp;Pengaturan Peminjaman
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Kategori</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="tambah_kategori.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" placeholder="nama kategori">
                  </div>
                  <div class="form-group">
                    <label>Nomor Rak</label>
                    <input type="text" name="nomor_rak" class="form-control" placeholder="Nomor rak">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  Kenny Kurniadi.</strong>
    All rights reserved.  
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
</body>
</html>
