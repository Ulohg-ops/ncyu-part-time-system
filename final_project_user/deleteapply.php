<?php 

include 'connect.php';
$sid=$_GET['sid'];
// $sql = "DELETE FROM student_data where sid='$sid'";


$sql2 = "DELETE FROM able_time where sid='$sid'";
$query=sqlsrv_query($conn,$sql2) or ("sql2 error".sqlsrv_errors());
$sql3 = "DELETE FROM work_department where sid='$sid'";
$query=sqlsrv_query($conn,$sql3) or ("sql3 error".sqlsrv_errors());
// $query=sqlsrv_query($conn,$sql) or ("sql error".sqlsrv_errors());
header("Location:manage.php")
?>


