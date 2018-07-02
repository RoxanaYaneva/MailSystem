<?php

include_once("connect.php");

session_start();
$username = $_SESSION["s_user"];

$query1 = "SELECT * FROM users WHERE username = '$username'";
$user_id = mysqli_fetch_object(mysqli_query($conn, $query1))->user_id;

$query2 = "SELECT box_id FROM userboxes WHERE user_id = '$user_id'";
$box_ids = mysqli_query($conn, $query2);

?>

<!DOCTYPE html>
<html>
<head>
	<title>User boxes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/usermails.css">
	<script type="text/javascript" src="../javascript/validateAdd.js"></script>
</head>
<body>
	<div class="wrapper">
		<p id="head">Hello, <?php echo $username; ?>. Choose a box or create a new one.</p>
		<form id="add_box" method="GET" action="addmail.php" onsubmit="return validateAdd()">
			<input id="box_id" type="text" name="box_id" placeholder="Enter name for the box.">
			<input class="button" type="submit" name="add_box" value="Add box">
			<label style="color: red;" id="invalid_box_id"></label>
		</form>
		<ul class="boxes">
			<?php
				while ($bid = mysqli_fetch_assoc($box_ids)["box_id"]) {
					echo "<li><a href='homepage.php?box=$bid&page=inbox'>&#9993;</a>";
					echo "<p>".$bid."</p>";
					echo "</li>";
				}
			?>
		</ul>
	</div>
</body>
</html>
