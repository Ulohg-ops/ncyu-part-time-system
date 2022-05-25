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


	echo "<script>alert('編輯成功!!!');
	window.location.href='edit.php';
	</script>"; 
	
	?>
</body>
</html>