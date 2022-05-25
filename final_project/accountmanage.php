   <?php 
   include'navbar.php';
   if(!isset($_SESSION['name'])){
        header('Location: login.php');
   } ?>

   <!DOCTYPE html>
   <html>
   <head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="css/style3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php 


    include'connect.php' ?>
</head>
<body>

     <div class="container" >
          <table class="table table-dark" style="width: 1300px;position: relative; right: 80px; top: 50px;" >
               <thead>
                    <tr>
                         <th scope="col">學號</th>
                         <th scope="col">姓名:</th>
                         <th scope="col">密碼:</th>
                         <th scope="col">Email:</th>
                         <th scope="col">電話:</th>
                         <th scope="col">刪除:</th>
                    </tr>
               </thead>
               <?php
               $sql="select user_log.sid,user_log.name,password,email,phone 
               from user_log,student_data 
               where user_log.sid=student_data.sid
               ";
               $qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());

               ?>
               <tbody>
                    <tr>
                         <?php while ($row=sqlsrv_fetch_array($qury)) { ?> <!--return a row as an array -->
                         <tr>

                              <td><?php echo $row['sid'];?></td>
                              <td><?php echo $row['name'];?> </td>
                              <td><?php echo $row['password'];?> </td>
                              <td><?php echo $row['email'];?></td>
                              <td><?php echo $row['phone'];?></td> 
                              <td>
                                   <a href="delete.php?sid=<?php echo $row["sid"];?>" class="btn btn-danger">刪除</a>
                              </td>
                         </tr>
                    <?php } ?>
               </tr>
          </tbody>
     </table>
</div>

</body>
</html>

