<?php

include 'config.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
   if($act == 'logout') {
        session_unset();
        session_destroy();
        header('Location: ../user/index.php');
    }
}
