<?php 
session_start();
include "connect.php";

if (isset($_POST['sid']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$sid = validate($_POST['sid']);
	$pass = validate($_POST['password']);
	
	if (empty($sid)) {
		header("Location: login.php?error=Student ID is required");
		exit();
	}else if(empty($pass)){
		header("Location: login.php?error=Password is required");
		exit();
	}else{
		$pass=md5($pass);
		$sql = "SELECT * FROM dbo.user_log WHERE sid='$sid' AND password='$pass'";

		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
		//stackoverflow.com/questions/23741534/sqlsrv-num-rows-not-returning-any-value

		if (sqlsrv_num_rows($result) == 1) {

			$row = sqlsrv_fetch_array($result);
			if ($row['sid'] === $sid && $row['password'] === $pass) {
				$_SESSION['name']=$row['name'];
				// echo $_SESSION['name'];
				$_SESSION['sid']=$sid;
				header("Location: apply.php");
				exit();
			}else{
				header("Location: login.php?error=Incorect User name or password");
				exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
			exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}