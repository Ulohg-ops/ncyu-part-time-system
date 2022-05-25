<?php 

include 'connect.php';
$sid=$_GET['sid'];
$sql = "DELETE FROM user_log where sid='$sid'";
header("Location:accountmanage.php")
?>


