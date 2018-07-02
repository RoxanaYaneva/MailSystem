<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<style type="text/css">
		h3, a {
			display: block;
			font-size: 140%;
			margin: 30px auto;
			text-decoration: none;
			text-align: center;
			padding: 10px;
		}

		img {
			display: block;
			margin: 50px auto 0;
			width: 100px;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<img src="../logo.png">
		<h3>Welcome,  
			<?php
			session_start();
		 	echo $_SESSION["s_user"];
		 	?>
		</h3>
		<p>Your account has been created successfully.</p>
		<a class="button" href="../index.php?page=login">Go to login page</a>
	</div>
</body>
</html>