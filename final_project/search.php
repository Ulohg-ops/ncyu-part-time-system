   <?php 
   include'navbar.php';
   if(!isset($_SESSION['name'])){
   	header('Location: login.php');

   } ?>
   <!DOCTYPE html>
   <html>
   <head>
   	<title>
   		
   	</title>
   	<link rel="stylesheet" type="text/css" href="css/search.css">
   	<?php  ?>
   	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   </head>
   <body>
   	<?php include 'connect.php'; ?>
   	<div class="contents" style="" >
   		<div class="leftbox" >
   			
   			<div class="title">	<h1 style="font-size: 30px;">查詢</h1></div>
   			<form action="" method="post">
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label">學號:</label>
   					</div>
   					<div class="col-auto">
   						<input type="text" class="form-control" name="sid"> 
   					</div>
   				</div>
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label">姓名:</label>
   					</div>
   					<div class="col-auto">
   						<input type="text" class="form-control"name="name"> 
   					</div>
   				</div>
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label">系級:</label>
   					</div>
   					<div class="col-auto">
   						<input type="text" class="form-control"name="class"> 

   					</div>
   				</div>
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label" style="width: 100px;">可工讀時間:</label>
   					</div>
   					<select class="form-select" aria-label="Default select example" name="able_time" style="width:200px;margin-left: 12px;">
   						<option selected>--------工讀時間------</option>
   						<option value="白天工讀">白天工讀</option>
   						<option value="夜間工讀">夜間工讀</option>
   						<option value="進修部相關單位工讀">進修部相關單位工讀</option>
   					</select>
   				</div>
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label">申請資格:</label>
   					</div>
   					<select class="form-select" aria-label="Default select example" name="quality" style="width:200px;margin-left: 12px;">
   						<option selected>--------申請資格------</option>
   						<option value="經濟弱勢學生">經濟弱勢學生</option>
   						<option value="具有專長之學生">具有專長之學生</option>
   					</select>
   				</div>
   				<div class="row" style="margin-top: 10px;">
   					<div class="col-auto">
   						<label class="col-form-label">申請單位:</label>
   					</div>
   					<select class="form-select" aria-label="Default select example" name="work_department" style="width:200px;margin-left: 12px;">
   						<option selected>--------申請單位------</option>
   						<option value="行政單位">行政單位</option>
   						<option value="圖書館">圖書館</option>
   						<option value="語言中心">語言中心</option>
   						<option value="電算中心">電算中心</option>
   						<option value="環安中心">環安中心</option>
   					</select>
   				</div>
   				<button type="submit" class="btn btn-primary" name="submit">查詢</button>
   			</form>

   		</div>
   		<div class="rightbox" >

   			<table class="table table-dark"  >
   				<thead>
   					<tr>
   						<th scope="col">學號</th>
   						<th scope="col">姓名:</th>
   						<th scope="col">系級</th>
   						<th scope="col">手機</th>
   						<th scope="col">可工讀時間</th>
   						<th scope="col">申請資格</th>
   						<th scope="col">工讀單位</th>
   						<th scope="col">詳情</th>

   					</tr>
   				</thead>
   				<?php if(isset($_POST['submit'])){
   					$sid=$_POST['sid'];
   					$name=$_POST['name'];
   					$class=$_POST['class'];
   					$able_time=$_POST['able_time'];
   					$quality=$_POST['quality'];
   					$work_department=$_POST['work_department'];

   					if($sid != "" || $name != "" || $class != "" || $quality != "" || $work_department != "" || $able_time != ""){
   						$sql="with tmp as(SELECT DISTINCT sid,
   						STUFF((	SELECT ',' + a.able_time
   						FROM able_time a WHERE a.sid=b.sid
   						FOR XML PATH('')), 1, 1, '') AS able_time
   						FROM able_time b),tmp2 as(SELECT DISTINCT sid,
   						STUFF((	SELECT ',' + a.work_department
   						FROM work_department a
   						WHERE a.sid=b.sid
   						FOR XML PATH('')
   						), 1, 1, '') AS work_department
   						FROM work_department b),
   						tmp3 as (select student_data.sid,name,class,birthday,email,id,phone,telephone,quality,able_time,work_department
   						from student_data,tmp,tmp2 where student_data.sid=tmp.sid and student_data.sid=tmp2.sid)
   						select * from tmp3 where name='$name' or class='$class' or quality='$quality' or work_department like '%$work_department%' or able_time like'%$able_time%'";
                        // echo $sql;
                           $qury=sqlsrv_query($conn,$sql) or die("sql error".sqlsrv_errors());

                           while ($row=sqlsrv_fetch_array($qury)) { ?> <!--return a row as an array -->
                           <tr>
                              <td><?php echo $row['sid'];?></td>
                              <td><?php echo $row['name'];?> </td>
                              <td><?php echo $row['class'];?> </td>
                              <td><?php echo $row['phone'];?></td>
                              <td><?php echo $row['able_time'];?></td>
                              <td><?php echo $row['quality'];?></td>
                              <td><?php echo $row['work_department'];?></td>
                              <td>
                                 <a href="profile.php?sid=<?php echo $row["sid"];?>" class="btn btn-primary">PROFILE</a>
                             </td>
                         </tr>
                     <?php } 
                 }
             }  ?>

         </table>
     </div>

 </div>
</body>
</html>