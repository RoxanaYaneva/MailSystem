<?php

include_once("connect.php");
include_once("validate.php");

session_start();
$username = $_SESSION["s_user"];

$query = "SELECT * FROM users WHERE username = '$username'";
$user_id = mysqli_fetch_object(mysqli_query($conn, $query))->user_id;

if (empty($_GET["box_id"])) {
	echo "<script>alert(\"Enter a name.\");</script>";
} else if (isset($_GET["add_box"])) {
	$box_id = modify_input($_GET["box_id"]);
	$check_query = "SELECT * FROM userboxes WHERE box_id = '$box_id'";
	$result = mysqli_query($conn, $check_query);
	if (mysqli_num_rows($result) == 0) {
		$add_query = "INSERT INTO userboxes (box_id, user_id, create_date) VALUES ('$box_id','$user_id', sysdate())";
		mysqli_query($conn, $add_query);
	} else {
		echo "<script>alert(\"There is already a box with this name.\");</script>";
	}
}

echo "<script>window.location='usermails.php';</script>";

?>