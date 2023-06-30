<?php

include('connect.php');

// const BASEURL = window.location.href;
define('BASEURL', 'http://localhost/simas/public');

$id = $_GET['id'];
$status = $_GET['statuspengajuan'];

$q = "UPDATE pengajuan_waka SET statuspengajuan=$status WHERE id=$id";

mysqli_query($connect, $q);

header('Location: ' . BASEURL . '/pengajuanWaka');