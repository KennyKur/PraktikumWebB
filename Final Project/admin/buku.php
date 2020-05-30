<?php

include '../php/config.php';
if(isset($_GET['id'])) {
  $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM buku WHERE id = $id");
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('nav.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Buku</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Data Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="tambah_buku.php"><button class="btn btn-primary"> Tambah Buku</button></a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Judul Buku</th>
                  <th>Author</th>
                  <th>stok</th>
                  <th>kategori</th>
                  <th>edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = 'SELECT buku.*, kategori.nama as kategori FROM buku INNER JOIN kategori ON buku.kategori_id = kategori.id';
                $data = queryMultiple($sql); 
                foreach($data as $row)
                {
                  echo"<tr>
                    <td>".$row['nama']."</td>
                    <td>".$row['author']."</td>
                    <td>".$row['stok']."</td>
                    <td>".$row['kategori']."</td>";?>
                    <td><a href="edit_buku.php?<?php echo"id=".$row['id'];?>"><button class="btn btn-warning"> edit</button></a>
                    <a href="buku.php?<?php echo"id=".$row['id'];?>"><button class="btn btn-success"> Hapus</button></a></td>
                  </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Judul Buku</th>
                  <th>Author</th>
                  <th>stok</th>
                  <th>kategori</th>
                  <th>edit</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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
<script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
