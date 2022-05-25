<?php include'navbar.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
	<form action="login2.php" method="post" class="form">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Student ID</label>
		<input type="text" name="sid" placeholder="Student ID"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
		<a href="signup.php" class="ca">Create an account</a> 
		<a href="forget.php" class="ca">Forget password</a>
	</form>
</body>
<footer class="bg-light text-center text-lg-start">
	<div class="text-center p-3" style="position: relative; top:240px; background-color: rgba(0, 0, 0, 0.2); width: 100%;">
		© 2021 Copyright:Ulohg
	</div>
	
</footer>
</html>