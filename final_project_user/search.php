<!DOCTYPE html>
<html>
<head>
	<?php include'navbar.php'; 
	include 'edit2.php';?>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/apply.css">

</head>

<body >
	<div class="banner">
		<div class="container">
			<div class="title">詳細資料</div>
			<div class="content">
				<form action="edit3.php" method="POST">

					<div class="title2">基本資料</div>
					<div class="user-details">
						<div class="input-box">
							<span class="details">姓名</span>
							<input type="text" placeholder="Enter your name"  name="name" value="<?php echo $name ;?>">
						</div>
						<div class="input-box">
							<span class="details">系級</span>
							<input type="text" placeholder="Enter your class"  name="class" value="<?php echo $class ;?>">
						</div>
						<div class="input-box">
							<span class="details">學號</span>
							<input type="text" name="sid" value="<?php echo $_GET['sid'] ?>" >
						</div>
						<div class="input-box">
							<span class="details">出生年月日</span>
							<input type="date" placeholder="yy/mm/dd"  id="date" name="birthday" value="<?php  echo $birthday ?>">
						</div>
						<div class="input-box">
							<span class="details">電子信箱</span>
							<input type="text" placeholder="Enter your email" class="email"
							name="email" value="<?php echo $email ;?>">
						</div>
						<div class="input-box">
							<span class="details">手機號碼</span>
							<input type="text" placeholder="Enter your number" class="phone"
							name="phone" value="<?php echo $phone ;?>">
						</div>
						<div class="input-box">
							<span class="details">身分證字號</span>
							<input type="text" placeholder="Enter your ID number" class="ID"
							name="id" value="<?php echo $id ;?>">
						</div>
						<div class="input-box">
							<span class="details">連絡電話</span>
							<input type="text" placeholder="Enter your telephone" class="telephone" name="telephone"
							value="<?php echo $telephone ;?>"> <!--required /*not empty*/ -->
						</div>

					</div>
					<!-- ------------成績----------->
					<div class="title2">成績</div>
					<div class="user-grades">

						<div class="input-box">
							<span class="grade">上學期學業成績</span>
							<input class="grade_placeholder" type="text" placeholder="first " name="first_grade" value="<?php echo $first_grade ;?>">
						</div>
						<div class="input-box">
							<span class="grade">下學期學業成績</span>
							<input class="grade_placeholder" type="text" placeholder="second" name="second_grade" value="<?php echo $second_grade ;?>">
						</div>
						<div class="input-box">
							<span class="grade">上學期操行成績</span>
							<input class="grade_placeholder" type="text" placeholder="first" name="first_conduct_grade" value="<?php echo $first_conduct_grade ;?>">
						</div>
						<div class="input-box">
							<span class="grade">下學期操行成績</span>
							<input class="grade_placeholder" type="text" placeholder="second " name="second_conduct_grade" value="<?php echo $second_conduct_grade ;?>">
						</div>
					</div>
					<!------------- radio button --------------->
					<div class="gender-details">
						<input type="radio" name="gender" id="dot-1" value="male"  <?php if($gender=="male"){ echo "checked";}?>>
						<input type="radio" name="gender" id="dot-2" value="female" <?php if($gender=="female"){ echo "checked";}?>>
						<span class="gender-title">性別</span>
						<div class="category">
							<label for="dot-1">
								<span class="dot one"></span>
								<span class="gender" >男</span>
							</label>

							<label for="dot-2">
								<span class="dot two"></span>
								<span class="gender">女</span>
							</label>

						</div>
					</div>
					<div class="quality-details">
						<input type="radio" name="quality" id="dot-3" value="經濟弱勢學生"  <?php if($quality=="經濟弱勢學生"){ echo "checked";}?>>
						<input type="radio" name="quality" id="dot-4" value="具有專長之學生" <?php if($quality=="具有專長之學生"){ echo "checked";}?>> 
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


				

					<div class="button">
						<input type="submit" value="更改">
					</div>
				</form>
			</div>
		</div>
	</div>


</body>

</html>


