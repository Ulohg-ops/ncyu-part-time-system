<?php include'navbar.php';
if(!isset($_SESSION['name'])){
	header('Location: login.php');
}?>
<!DOCTYPE html>
<html>
<head>
	
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/apply.css">

</head>

<body >
	<div class="banner">
		<div class="container">
			<div class="title">工讀申請</div>
			<div class="content">
				<form action="apply2.php" method="post">

					<p class="error">     <!-- <?php  echo $_GET['error']; ?></p> -->
					<div class="title2">基本資料</div>
					<div class="user-details">
						<div class="input-box">
							<span class="details">姓名</span>
							<input type="text" placeholder="Enter your name"  name="name">
						</div>
						<div class="input-box">
							<span class="details">系級</span>
							<input type="text" placeholder="Enter your class" name="class">
						</div>
						<div class="input-box">
							<span class="details">學號</span>
							<input type="text" placeholder="Enter your student id" 	name="sid" required>
						</div>
						<div class="input-box">
							<span class="details">出生年月日</span>
							<input type="date" placeholder="yy/mm/dd"  id="date" name="birthday">
						</div>
						<div class="input-box">
							<span class="details">電子信箱</span>
							<input type="text" placeholder="Enter your email" class="email"
							name="email">
						</div>
						<div class="input-box">
							<span class="details">手機號碼</span>
							<input type="text" placeholder="Enter your number" class="phone"
							name="phone">
						</div>
						<div class="input-box">
							<span class="details">身分證字號</span>
							<input type="text" placeholder="Enter your ID number" class="ID"
							name="id">
						</div>
						<div class="input-box">
							<span class="details">連絡電話</span>
							<input type="text" placeholder="Enter your telephone" class="telephone" name="telephone"> <!--required /*not empty*/ -->
						</div>

					</div>
					<!-- ------------成績----------->
					<div class="title2">成績</div>
					<div class="user-grades">

						<div class="input-box">
							<span class="grade">上學期學業成績</span>
							<input class="grade_placeholder" type="text" placeholder="first " name="first_grade" >
						</div>
						<div class="input-box">
							<span class="grade">下學期學業成績</span>
							<input class="grade_placeholder" type="text" placeholder="second" name="second_grade" >
						</div>
						<div class="input-box">
							<span class="grade">上學期操行成績</span>
							<input class="grade_placeholder" type="text" placeholder="first" name="first_conduct_grade" >
						</div>
						<div class="input-box">
							<span class="grade">下學期操行成績</span>
							<input class="grade_placeholder" type="text" placeholder="second " name="second_conduct_grade" >
						</div>
					</div>
					<!------------- radio button --------------->
					<div class="gender-details">
						<input type="radio" name="gender" id="dot-1" value="male" checked>
						<input type="radio" name="gender" id="dot-2" value="female">
						<span class="gender-title">性別</span>
						<div class="category">
							<label for="dot-1">
								<span class="dot one"></span>
								<span class="gender">男</span>
							</label>

							<label for="dot-2">
								<span class="dot two"></span>
								<span class="gender">女</span>
							</label>

						</div>
					</div>
					<div class="quality-details">
						<input type="radio" name="quality" id="dot-3" value="經濟弱勢學生" checked>
						<input type="radio" name="quality" id="dot-4" value="具有專長之學生">
						<span class="quality-title">申請資格</span>
						<div class="category">
							<label for="dot-3">
								<span class="dot three"></span>
								<span class="quality">經濟弱勢學生:如低收入戶子女、中低收入戶子女、原住民、僑生、身心障礙人士子女及身心障礙</span>
							</label>

							<label for="dot-4">
								<span class="dot four"></span>
								<span class="quality">具有專長之學生：如電腦、美術等特殊專長</span>
							</label>

						</div>
					</div>
					<div class="able-time-details">
						<input type="checkbox" name="able_time[]" id="dot-5" value="白天工讀">
						<input type="checkbox" name="able_time[]" id="dot-6" value="夜間工讀">
						<input type="checkbox" name="able_time[]" id="dot-7" value="進修部相關單位工讀"> 
						<span class="able-time-title">可工讀時間</span>
						<div class="category">
							<label for="dot-5">
								<span class="dot five"></span>
								<span class="able-time">白天工讀</span>
							</label>

							<label for="dot-6">
								<span class="dot six"></span>
								<span class="able-time">夜間工讀</span>
							</label>
							<label for="dot-7">
								<span class="dot seven"></span>
								<span class="able-time">進修部相關單位工讀</span>
							</label>
						</div>
					</div>


					<div class="work-department-details">
						<input type="checkbox" name="work_deparyment[]" id="dot-8" value="行政單位">
						<input type="checkbox" name="work_deparyment[]" id="dot-9" value="圖書館">
						<input type="checkbox" name="work_deparyment[]" id="dot-10" value="語言中心">
						<input type="checkbox" name="work_deparyment[]" id="dot-11" value="電算中心">
						<input type="checkbox" name="work_deparyment[]" id="dot-12" value="環安中心">
						
						<span class="work-department-title">擬工讀單位</span>
						<div class="category">
							<label for="dot-8">
								<span class="dot eight"></span>
								<span class="able-time">行政單位</span>
							</label>

							<label for="dot-9">
								<span class="dot nine"></span>
								<span class="able-time">圖書館</span>
							</label>
							<label for="dot-10">
								<span class="dot ten"></span>
								<span class="able-time">語言中心</span>
							</label>
							<label for="dot-11">
								<span class="dot eleven"></span>
								<span class="able-time">電算中心</span>
							</label>
							<label for="dot-12">
								<span class="dot twelve"></span>
								<span class="able-time">環安中心</span>
							</label>
						</div>
					</div>

					<div class="button">
						<input type="submit" value="申請">
					</div>
				</form>
			</div>
		</div>
	</div>

	
</body>
<footer class="bg-light text-center text-lg-start">
	<div class="text-center p-3" style="bottom: 0px; background-color: rgba(0, 0, 0, 0.2); width: 100%;">
		© 2021 Copyright:Ulohg
	</div>

</footer>
</html>


