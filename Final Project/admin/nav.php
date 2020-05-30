<?php

if (isset($_SESSION['id'])) {
  $status = $_SESSION['status'];
  if($status!== '2')
  {
    header("location: ../user/index.php");
  }
}
else{
  header("location:../user/index.php");
}
?>
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