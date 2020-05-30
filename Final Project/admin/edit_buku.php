<?php

include '../php/config.php';
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM buku WHERE id = '$id'";
  $data = queryMultiple($sql);
  foreach ($data as $datas)
  {
    $row['nama'] = $datas['nama'];
    $row['author'] = $datas['author'];
    $row['stok'] = $datas['stok'];
  }
}
if(isset($_POST['submit']))
{
  $id = $_POST['id'];
  echo $id;
  $nama = $_POST['nama'];
  $author = $_POST['author'];
  $stok = $_POST['stok'];
  $kategori = $_POST['kategori'];
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
      
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  $thumbnail = basename($_FILES["fileupload"]["name"]);
  $sql = "UPDATE buku SET kategori_id = '$kategori', nama = '$nama', author='$author', stok='$stok', thumbnail = '$thumbnail' WHERE id = '$id' ";
  if(mysqli_query($conn,$sql))
  {
    header("location: buku.php");
  }

}
$data = queryMultiple("SELECT * FROM kategori");
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
            <h1 class="m-0 text-dark">Edit Buku</h1>
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
                <h3 class="card-title">Input Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="edit_buku.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <label>Judul Buku</label>
                    <input type="text" name="nama" class="form-control" placeholder="judul buku" value="<?=$row['nama']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Penulis buku" value="<?=$row['author']?>">
                  </div>
                  <div class="form-group">
                    <label>stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="Stok buku" value="<?=$row['stok']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="fileupload" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Custom Select</label>
                    <select name="kategori" class="custom-select">
                      <?php foreach($data as $row)
                      {
                        echo"<option value=".$row['id'].">".$row['nama']."</option>";
                      }?>
                    </select>
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