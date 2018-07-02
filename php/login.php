<?php

include_once("connect.php");
include_once("validate.php");

if (isset($_POST["login"])) {
	$username = modify_input($_POST["username"]);
	$passwd = modify_input($_POST["passwd"]);
	$is_valid = false;

	// check whether there is such user in the database
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		$is_passwd_valid = password_verify($passwd, $row["password"]);
		if ($row["username"] == $username && $is_passwd_valid) {
			$is_valid = true;
			$_SESSION["s_user"] = $_POST["username"];
			echo "<script>window.location='php/usermails.php';</script>";
		}
	} 
	if (!$is_valid) {
		echo "<script> alert(\"Invalid username or password!\"); </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="javascript/validate.js"></script>
</head>
<body>
	<div id="login">
		<h2>Login</h2>
		<form id="logForm" method="POST" onsubmit="return validateLogin()">
			<input id="username" name="username" type="text" placeholder="Mail/username">
			<input id="passwd" name="passwd" type="password" placeholder="Password">
			<label id="error"></label>
			<input id="login" class="button" type="submit" name="login" value="Login">
		</form>
	</div>
</body>
</html>
