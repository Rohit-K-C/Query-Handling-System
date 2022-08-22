<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<link rel="stylesheet" type="text/css" href="login.css">
<body>
	<div class="SMS">
	<h1>Query Handling System</h1>
	</div>
	<div class="user">
		<h3>User Login</h3>
		<form action="signin.php" method="post">
			<label>Email:</label>
			<input type="text" name="email">
			<br><br>
			<label>Password:</label>
			<input type="password" name="password">
			<br><br>
			<input type="submit" name="submit" value="Login">
			<div class="not"></div>
			<label>Not a user?</label>
			<a href="signup.php">Sign up</a>
		</form>
		</div>
</body>
</html>