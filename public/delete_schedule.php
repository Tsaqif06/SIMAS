<?php 
require_once('../app/views/kalender/db-connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./kalender') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); location.replace('./kalender') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>