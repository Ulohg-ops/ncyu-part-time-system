<?php 
session_start(); 
include "connect.php";

if (isset($_POST['sid']) && isset($_POST['password'])
	&& isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sid = validate($_POST['sid']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'sid='. $sid. '&name='. $name;


	if (empty($sid)) {
		header("Location: signup.php?error=Student ID is required&$user_data");
		exit();
	}else if(empty($pass)){
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	}
	else if(empty($re_pass)){
		header("Location: signup.php?error=Re Password is required&$user_data");
		exit();
	}

	else if(empty($name)){
		header("Location: signup.php?error=Name is required&$user_data");
		exit();
	}

	else if($pass !== $re_pass){
		header("Location: signup.php?error=The confirmation password  does not match&$user_data");
		exit();
	}

	else{

		
        $pass = md5($pass);// hashing the password

        $sql = "SELECT * FROM user_log WHERE sid='$sid' ";
        $result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));

        if (sqlsrv_num_rows($result) > 0) {
        	header("Location: signup.php?error=The sid is taken try another&$user_data");
        	exit();
        }else {
        	$sql2 = "INSERT INTO  dbo.user_log(sid, password, name) VALUES('$sid', '$pass', '$name')";
        	$result2 = sqlsrv_query($conn, $sql2, array(), array( "Scrollable" => 'static' ));
        	$sql3="INSERT INTO dbo.student_data(sid,class,name,email,birthday,phone,id,telephone,first_grade,second_grade,first_conduct_grade,second_conduct_grade,gender,quality) values('$sid','','$name','','','','','','','','','','','')";
        	$result3 = sqlsrv_query($conn, $sql3, array(), array( "Scrollable" => 'static' ));
        	if ($result2) {
        		header("Location: signup.php?success=Your account has been created successfully");
        		exit();
        	}else {
        		header("Location: signup.php?error=unknown error occurred&$user_data");
        		exit();
        	}
        }
    }

}else{
	header("Location: signup.php");
	exit();
}