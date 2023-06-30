<?php

// include('connect.php');
$db = 'sarpras';
$host = 'localhost';
$user = 'root';
$pass = '';

// const BASEURL = window.location.href;
define('BASEURL', 'http://localhost/simas/public');

$id = $_GET['id'];
$status = $_GET['statusperbaikan'];

$connect = mysqli_connect($host, $user, $pass, $db
);
$q = "UPDATE data_perbaikan SET statusperbaikan=$status WHERE id=$id";

mysqli_query($connect, $q);

header('Location: ' . BASEURL . '/perbaikan');