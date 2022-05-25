<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<title></title>
</head>
<div class="navbar">
	<div class="homepage"><a href="index.php" style="text-decoration: none; color: #000000;"><h1>嘉義大學工讀管理系統</h1></a></div>
	<ul>
		<li><a href="apply.php">工讀申請</a></li>
		<li><a href="search.php">工讀資料查詢</a></li>
		<li><a href="manage.php">資料管理</a></li>	
		<li><a href="accountmanage.php">帳號管理</a></li>	
		<?php if (!empty($_SESSION['name'])) { ?>

			<div class="btn-group">
				<button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
				style="border: none;font-size: 18px;top: -3px; font-weight: 500;">
				<?php echo "管理員".$_SESSION['name'];
				?>
			</button>
			<ul class="dropdown-menu">
				<a class="dropdown-item" href="changepassword.php" >修改密碼</a>
				<hr class="dropdown-divider">
				<a class="dropdown-item" href="logout.php" >登出</a>
			</ul>
		</div>
	<?php } else { ?>
		<li> <a href="login.php">登入</a></li>
	<?php } ?>
</div>

</html>