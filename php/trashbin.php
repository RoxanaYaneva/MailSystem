<?php

include_once("connect.php");

$username = $_SESSION["s_user"];
$userbox = $_SESSION["s_box"];

if (isset($_POST["delete"])) {
	if (!empty($_REQUEST["item"])) {
		foreach ($_REQUEST["item"] as $messege_id) {
			$delq = "DELETE FROM trash WHERE msg_id = '$messege_id' AND box_id = '$userbox'";
			mysqli_query($conn, $delq);
		}
	}
}

$query = "SELECT msg_id, box_id, creator_id, recipient_id, subject, create_date FROM trash WHERE (recipient_id = '$username' OR creator_id = '$username') AND box_id = '$userbox'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Trash</h3>
	<table id="tableSent">
		<tbody>
		<?php
			echo "<tr id='first_row'><td width='50'></td><td width='100'>From</td></td><td width='100'>To</td><td width='200'>Subject</td><td width='150'>Date</td></tr>";
			while (list($mid, $bid, $cid, $rid, $subj, $cdate) = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<form method='POST'>";
				echo "<td><input type='checkbox' name='item[]' value='$mid'></td>";
				echo "<td>".$cid."</td>";
				echo "<td>".$rid."</td>";
				echo "<td>".$subj."</td>";
				echo "<td>".$cdate."</td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
	<input class="button" type="submit" value="Delete" name="delete">
	</form>
</body>
</html>

