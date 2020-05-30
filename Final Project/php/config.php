<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'praktikumweb_final_project';

$conn = mysqli_connect($host, $user, $pass, $db);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'functions.php';
