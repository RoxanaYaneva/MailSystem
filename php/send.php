<?php

include_once("connect.php");
include_once("validate.php");

$user_id = $_SESSION["s_user"];
$box_id = $_SESSION["s_box"];

if (isset($_POST["send"])) {
	if (!empty($_REQUEST["anon"]))  {
		$user_id = "anonymous";
	}
	$to = parseRecipients($_POST["to"]);
	$subj = modify_input($_POST["subject"]);
	$msg = modify_input($_POST["messege"]);
	foreach ($to as $rid => $rbid) {
		$send_inbox = "INSERT INTO inbox (msg_id, cr_box_id, rec_box_id, creator_id, recipient_id, subject, msg_body, create_date) VALUES ('', '$box_id', '$rbid', '$user_id', '$rid', '$subj', '$msg', sysdate())";
		$send_sentbox = "INSERT INTO sent (msg_id, cr_box_id, rec_box_id, creator_id, recipient_id, subject, msg_body, create_date) VALUES ('', '$box_id', '$rbid', '$user_id', '$rid', '$subj', '$msg', sysdate())";
		mysqli_query($conn, $send_inbox);
		mysqli_query($conn, $send_sentbox);
	}
}

// if we send a few messeges to one user but to different boxes this method won't give right results
function parseRecipients($to) {
	$arr = array();
	$rec = explode(",", $to);
	foreach ($rec as $item) {
		$str = explode(":", $item);
		$arr[$str[0]] = $str[1];
	}
	return $arr;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/tables.css">
	<style type="text/css">
		.field {
			box-sizing: border-box;
			height: 25px;
			width: 100%;
			margin-bottom: 5px;
			padding: 0 5px;
		}
	</style>
</head>
<body>
	<h3>Send messege</h3>
	<form method="POST">
		<table id="tableSend">
			<tr>
				<td>
					<input id="checkbox" type="checkbox" name="anon[]">
				</td>
				<td>Anonymous</td>
			</tr>
			<tr>
				<th>To:</th>
				<td>
					<input class="field" type="text" name="to" placeholder="user:box [,user2:box,user3:box...]">	
				</td>
			</tr>
			<tr>
				<th>Subject:</th>
				<td>
					<input class="field" type="text" name="subject">
				</td>
			</tr>
			<tr>
				<th>Message:</th>
				<td>
					<textarea rows="11" cols="70" name="messege"></textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">
					<input class="button" type="submit" name="send" value="Send">
					<input class="button" type="reset" value="Cancel">
				</th>
			</tr>
		</table>
	</form>
</body>
</html>