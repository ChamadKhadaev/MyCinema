<?php
require('functions.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style_crud.css">
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="POST" action="register.php">
    <?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" required value="<?php if (isset($_POST["user_type"])) {echo $_POST["user"];} ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" required value="<?php if (isset($_POST["user_type"])) {echo $_POST["user"];} ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" required name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" required name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>