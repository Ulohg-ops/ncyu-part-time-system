<?php 
session_start();
include "connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	
	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
		exit();
	}else if(empty($pass)){
		header("Location: login.php?error=Password is required");
		exit();
	}else{
		$pass=md5($pass);
		$sql = "SELECT * FROM dbo.ad WHERE user_name='$uname' AND password='$pass'";

		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
		//stackoverflow.com/questions/23741534/sqlsrv-num-rows-not-returning-any-value

		if (sqlsrv_num_rows($result) == 1) {

			$row = sqlsrv_fetch_array($result);
			if ($row['user_name'] === $uname && $row['password'] === $pass) {
				$_SESSION['name']=$uname;
				header("Location: manage.php");
				// exit();
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