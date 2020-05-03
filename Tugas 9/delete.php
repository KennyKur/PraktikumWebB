<?php
include_once("config.php");

   $id = $_GET['id'];

      $result = mysqli_query($mysqli, "DELETE FROM biodata WHERE id_user ='$id'");
      header("Location: index.php");
?>
