<!DOCTYPE html>
<html>
<head>
	<?php include 'connect.php' ?>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$sid=$_POST['sid'];
	$name=$_POST['name'];	
	$class=$_POST['class'];
	$phone=$_POST['phone'];	
	$id=$_POST['id'];	
	$telephone=$_POST['telephone'];	
	$email=$_POST['email'];	
	$first_grade= $_POST['first_grade'];	
	$second_grade= $_POST['second_grade'];	
	$first_conduct_grade= $_POST['first_conduct_grade'];
	$second_conduct_grade= $_POST['second_conduct_grade'];
	$birthday=$_POST['birthday']; 
	$gender=$_POST['gender'];
	$quality=$_POST['quality'];
	$able_time=$_POST['able_time'];
	$work_department=$_POST['work_deparyment'];


	$sql="UPDATE dbo.student_data set
	sid='$sid',
	name='$name',
	class='$class',
	phone='$phone',
	id='$id',
	birthday='$birthday',
	telephone='$telephone',
	email='$email',
	first_grade='$first_grade',
	second_grade='$second_grade',
	first_conduct_grade='$first_conduct_grade',
	second_conduct_grade='$second_conduct_grade',
	gender='$gender',
	quality='$quality'
	where sid='$sid'";

	$query = sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());

	$sql_able_time = '';
	foreach($able_time as $g) {
		if($sql_able_time != '') $sql_able_time.= ',';
		$sql_able_time .= "('".$sid."'".",'".$g."')";
	}
	if($sql_able_time != '') {
		$sql_able_time = "
		DELETE from able_time where sid='$sid' ;
		INSERT INTO able_time (sid, able_time) VALUES ". $sql_able_time;
	}


	$sql_work_department = '';
	foreach($work_department as $g) {
		if($sql_work_department != '') $sql_work_department.= ',';
		$sql_work_department .= "('".$sid."'".",'".$g."')";
	}
	if($sql_work_department != '') {
		$sql_work_department = "
		DELETE from work_department where sid='$sid' ;
		INSERT INTO work_department (sid, work_department) VALUES ". $sql_work_department;
	}

	$query = sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());
	$query2 = sqlsrv_query($conn,$sql_able_time) or die("sql error".sqlsrv_errors());
	$query3 = sqlsrv_query($conn,$sql_work_department) or die("sql error".sqlsrv_errors());


	echo "<script>alert('編輯成功!!!');
	window.location.href='manage.php';
	</script>"; 
	
	?>
</body>
</html>