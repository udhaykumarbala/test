<?php
session_start();
include_once 'config.php';
if(isset($_POST['login']))
{
	$username= mysqli_real_escape_string($link,$_POST['username']);
	$password= mysqli_real_escape_string($link,$_POST['password']);
	$result = mysqli_query($link,"SELECT * FROM users WHERE email = '". $username ."' AND password ='". $password ."'");

	if($row = mysqli_fetch_array($result))
	{
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['name'];
		// error_log("message".print_r($_SESSION['y=user_name'],true));
		header("Location:dashboard.php");
	}
}

?>





<!DOCTYPE html>
<html>
	<head>
		<title>
		Log in..
		</title>
	</head>
	<body>
	  <form id="login-form" method="post">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="********">
		<input type="submit" name="login">
	  </form>
	</body>
</html>