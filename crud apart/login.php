<?php
	require_once('function.php');
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style_crud.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="POST" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required value="<?php if (isset($_POST["username"])) {echo $_POST["username"];} ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required value="<?php if (isset($_POST["password"])) {$_POST["username"];} ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn" value="" >Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>