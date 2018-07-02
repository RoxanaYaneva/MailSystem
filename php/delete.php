<?php

include_once("connect.php");

session_start();
$box_id = $_SESSION["s_box"];

if (isset($_POST["delete"])) {
	if (!empty($_REQUEST["item"])) {
		foreach ($_REQUEST["item"] as $messege_id) {
			$query = "";
			if ($_REQUEST["page"] == "inbox") {
				$query = "SELECT * FROM inbox WHERE msg_id = '$messege_id' AND rec_box_id = '$box_id'";
			} else {
				$query = "SELECT * FROM sent WHERE msg_id = '$messege_id' AND cr_box_id = '$box_id'";
			}
			$result =  mysqli_fetch_object(mysqli_query($conn, $query));

			$mid = $result->msg_id;
			$cid = $result->creator_id;
			$rid = $result->recipient_id;
			$subj = $result->subject;
			$msg = $result->msg_body;
			$cdate = $result->create_date;
			$trash_query = "INSERT INTO trash (trash_id, box_id, msg_id, creator_id, recipient_id, subject, messege, create_date) VALUES ('', '$box_id', '$mid', '$cid', '$rid', '$subj', '$msg', '$cdate')";
			mysqli_query($conn, $trash_query);

			if ($_REQUEST["page"] == "inbox") {
				$del_query = "DELETE FROM inbox WHERE msg_id = '$messege_id' AND rec_box_id = '$box_id'";
			} else {
				$del_query = "DELETE FROM sent WHERE msg_id = '$messege_id' AND cr_box_id = '$box_id'";
			}
			
			mysqli_query($conn, $del_query);
		}
	}
	$page = $_REQUEST["page"];
	echo "<script> window.location='homepage.php?box=$box_id&page=$page';</script>";
}

?>