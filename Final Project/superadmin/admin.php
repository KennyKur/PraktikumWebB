<?php

include '../php/config.php';
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $status = $_GET['status'];
  if($status==1)
  {
    mysqli_query($conn,"UPDATE detail_admin SET status = 0 WHERE id = $id");
  }
  else{
    mysqli_query($conn,"UPDATE detail_admin SET status = 1 WHERE id = $id");
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
          <a href="index.php" class="d-block">Super Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="fas fa-user-friends"></i>
              <p>
                &nbsp;&nbsp;Pengaturan Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link">
              <i class="fas fa-user-friends"></i>
              <p>
                &nbsp;&nbsp;Pengaturan User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buku.php" class="nav-link">
              <i class="fas fa-book"></i> 
              <p>
                &nbsp;&nbsp;Pengaturan Buku
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
            <h1 class="m-0 text-dark">List Admin</h1>
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
              <h3 class="card-title">List Data Admin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="tambah_admin.php"><button class="btn btn-primary"> Tambah Admin</button></a>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No_telp</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = 'SELECT detail_admin.*, users.email FROM detail_admin INNER JOIN users ON detail_admin.user_id = users.id';
                $data = queryMultiple($sql); 
                foreach($data as $row)
                {
                  echo"<tr>
                    <td>".$row['nama']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['no_telp']."</td>";
                    if($row['status']==1)
                    {
                      echo "<td> Active </td>";
                    }
                    else{
                      echo "<td> Not Active </td>";
                    }?>
                    <td><a href="admin.php?<?php echo"id=".$row['id']."&status=".$row['status'];?>"><button class="btn btn-success"> ganti status</button></a></td>
                  </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No_telp</th>
                  <th>Status</th>
                  <th>Edit</th>
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
