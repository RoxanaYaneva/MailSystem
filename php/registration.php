<?php

include_once("connect.php");
include_once("validate.php");

if (isset($_POST["reg"])) {
	$name = modify_input($_POST["name"]);
	$username = modify_input($_POST["username"]);
	$passwd = modify_input($_POST["passwd"]);
	$passwd_repeat = modify_input($_POST["passwd_repeat"]);

	// check if there is already such user
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 0) {
		$hash_passwd = password_hash($passwd, PASSWORD_DEFAULT);
		$add_query = "INSERT INTO users VALUES('', '$username','$hash_passwd','$name','{$_POST['birth_date']}')";
		mysqli_query($conn, $add_query);
		$_SESSION["s_user"] = $_POST["username"];
		echo "<script>window.location='php/success.php';</script>";
	} else {
		echo "<script>alert(\"This username already exists!\");</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="javascript/validate.js"></script>
</head>
<body>
	<div id="registration">
		<h2>Registration</h2>
		<form id="regForm" method="POST" onsubmit="return validateReg()">
			<input id="name" name="name" type="text" placeholder="Your name">
			<input id="birthdate" name="birth_date" type="text" onfocus="(this.type='date')" placeholder="Birth date">
			<input id="username" name="username" type="text" placeholder="Mail/username">
			<label id="invalid_username"></label>
			<input id="passwd" name="passwd" type="password" placeholder="Password">
			<label id="invalid_passwd"></label>
			<input id="passwd_repeat" name="passwd-repeat" type="password" placeholder="Repeat password">
			<label id="error"></label>
			<input id="register" class="button" type="submit" name="reg" value="Register">
		</form>
	</div>
</body>
</html>