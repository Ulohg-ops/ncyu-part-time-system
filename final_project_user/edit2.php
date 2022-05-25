<?php
include 'connect.php';
$sid= $_SESSION['sid'];

$sql="select * from student_data where student_data.sid='$sid'";

$qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());
while ($row=sqlsrv_fetch_array($qury)) { 
	$sid=$row['sid'];	
	$name=$row['name'];	
	$class=$row['class'];
	$phone=$row['phone'];	
	$id=$row['id'];	
	$telephone=$row['telephone'];	
	$email=$row['email'];	
	$first_grade= $row['first_grade'];	
	$second_grade= $row['second_grade'];	
	$first_conduct_grade= $row['first_conduct_grade'];
	$second_conduct_grade= $row['second_conduct_grade'];
	$birthday=$row['birthday']->format('Y-m-d');
	$gender=$row['gender'];
	$quality=$row['quality'];
	// $able_time=$row['able_time'];
	// $work_department=$row['work_department'];
}