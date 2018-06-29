<?php 
session_start();
error_reporting(1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">
		a {
			text-decoration: none;
			color: black;
		}
		a:hover { color: white; }
	</style>
</head>
<body>
	<div class="wrapper">
		<nav>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="index.php?page=login">Login</a>
				</li>
				<li>
					<a href="index.php?page=registration">Registration</a>
				</li>
				<li>
					<a href="index.php?page=about">About</a>
				</li>
			</ul>
		</nav>
		<main class="content">
			<?php
				@$page = $_REQUEST['page'];
				if ($page == "") {
			?>
			<div id="homepage">
				<img id="logo" src="logo.png">
				<p>Your internal mail system.</p>
			</div>
			<?php
				}
				if ($page == "registration") {
					include_once('php/registration.php');
				}
				if ($page == "login") {
					include_once('php/login.php');
				}
				if ($page == "about") {
			?>
			<div id="about">
				<h1>WEB Technologies</h1>
				<h2>Роксана Янева</h2>
				<h3>Софтуерно инженерство</h3>
				<h3>3 курс, 5 група, 61871</h3>
			</div>
			<?php
				}	
			?>
		</main>
	</div>
</body>
</html>