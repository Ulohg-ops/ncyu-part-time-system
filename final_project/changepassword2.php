<?php 
session_start();



include "connect.php";

if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
   function validate($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }

 $op = validate($_POST['op']);
 $np = validate($_POST['np']);
 $c_np = validate($_POST['c_np']);

 if(empty($op)){
  header("Location: changepassword.php?error=Old Password is required");
  exit();
}else if(empty($np)){
  header("Location: changepassword.php?error=New Password is required");
  exit();
}else if($np !== $c_np){
  header("Location: changepassword.php?error=The confirmation password  does not match");
  exit();
}else {
    	// hashing the password
   $op = md5($op);
   $np = md5($np);
   // echo md5(81dc9bdb52d04dc20036dbd8313ed055);
   $name = $_SESSION['name'];
   echo "old".$op."<br>";
   echo "new".$np."<br>";
   $sql = "SELECT password  FROM ad WHERE  user_name='$name' AND password='$op'";
   echo $sql;
   $result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
  echo  sqlsrv_num_rows($result);
   if(sqlsrv_num_rows($result)===1){
       $sql2 ="UPDATE ad SET password='$np' WHERE name='$name'";
       echo $sql2;
       $result2 = sqlsrv_query($conn, $sql2, array(), array( "Scrollable" => 'static' ));
       header("Location: changepassword.php?success=Your password has been changed successfully");
       exit();

   }else {
       header("Location: changepassword.php?error=Incorrect password");
       exit();
   }

}


}else{
	header("Location: changepassword.php");
	exit();
}
