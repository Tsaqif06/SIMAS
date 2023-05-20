<?php

include('connect.php');

// const BASEURL = window.location.href;
define('BASEURL', 'http://localhost/simas/public');

$id = $_GET['id'];
$status = $_GET['dtatus'];

$q = "UPDATE pengajuan_mapel SET dtatus=$status WHERE id=$id";

mysqli_query($connect, $q);

header('Location: ' . BASEURL . '/pengajuanMapel');