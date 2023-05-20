<?php

// include('connect.php');
$db = 'sarpras';
$host = 'localhost';
$user = 'root';
$pass = '';

// const BASEURL = window.location.href;
define('BASEURL', 'http://localhost/simas/public');

$id = $_GET['id'];
$status = $_GET['statuspengajuan'];

$connect = mysqli_connect($host, $user, $pass, $db
);
$q = "UPDATE pengajuan_jurusan SET statuspengajuan=$status WHERE id=$id";

mysqli_query($connect, $q);

header('Location: ' . BASEURL . '/pengajuanJurusan');