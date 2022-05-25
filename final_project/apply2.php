<?php 


?><!DOCTYPE html>
<?php include'navbar.php' ?>

<html>
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/apply.css"> 
 <style type="text/css"></style>
</head>
<body>
  <?php   include "connect.php"; 
  $sid=$_POST['sid'];
  $name=$_POST['name'];
  $class=$_POST['class'];
  $birthday=$_POST['birthday'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $id=$_POST['id'];
  $telephone=$_POST['telephone'];

  $first_grade=$_POST['first_grade'];
  $second_grade=$_POST['second_grade'];
  $first_conduct_grade=$_POST['first_conduct_grade'];
  $second_conduct_grade=$_POST['second_conduct_grade'];

  $gender=$_POST['gender'];
  $quality=$_POST['quality'];

  $able_time=$_POST['able_time'];
  $work_department=$_POST['work_deparyment'];
//  print_r($able_time) ;


  // ------------switch able time array into mulitple sql ------
  $sql_able_time = '';
  foreach($able_time as $g) {
   if($sql_able_time != '') $sql_able_time.= ',';
   $sql_able_time .= "('".$sid."'".",'".$g."')";
 }
 if($sql_able_time != '') {
  $sql_able_time = "INSERT INTO able_time (sid, able_time) VALUES ". $sql_able_time;
}
// echo $sql_able_time;
// ------------end switch array into mulitple sql-------

 // ------------switch work department array into mulitple sql ------
$sql_work_department = '';
foreach($work_department as $g) {
  if($sql_work_department != '') $sql_work_department.= ',';
  $sql_work_department .= "('".$sid."','".$g."')";
}
if($sql_work_department != '') {
  $sql_work_department = "INSERT INTO work_department (sid, work_department) VALUES ". $sql_work_department;
}
// echo "<br>".$sql_work_department;
// ------------end switch array into mulitple sql-------

  $sql="INSERT INTO dbo.student_data(sid,class,name,email,birthday,phone,id,telephone,first_grade,second_grade,first_conduct_grade,second_conduct_grade,gender,quality) values('$sid','$class','$name','$email','$birthday','$phone','$id','$telephone','$first_grade','$second_grade','$first_conduct_grade','$second_conduct_grade','$gender','$quality')"; //一定要打''

  $query=sqlsrv_query($conn,$sql) or ("sql error".sqlsrv_errors());
  $query2=sqlsrv_query($conn,$sql_able_time) or ("sql error".sqlsrv_errors());
  $query3=sqlsrv_query($conn,$sql_work_department) or ("sql error".sqlsrv_errors());
  ?>

 echo "<script>alert('收到你的申請了!!!');
  window.location.href='index.php';
  </script>"; 
  
</div>



</div>
</body>
</html>