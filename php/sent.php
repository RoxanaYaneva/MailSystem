<?php

include_once("connect.php");

$username = $_SESSION["s_user"];
$userbox = $_SESSION["s_box"];

$query = "SELECT msg_id, recipient_id, subject, create_date FROM sent WHERE (creator_id = '$username' OR creator_id = 'anonymous') AND cr_box_id = '$userbox'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Sent</h3>
	<table id="tableSent">
		<tbody>
		<?php
			echo "<tr id='first_row'><td width='50'></td><td width='150'>To</td><td width='200'>Subject</td><td width='150'>Date</td></tr>";
			while (list($mid, $rid, $subj, $cdate) = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<form action='delete.php?page=sent' method='POST'>";
				echo "<td><input type='checkbox' name='item[]' value='$mid'></td>";
				echo "<td>".$rid."</td>";
				echo "<td><a href='homepage.php?from=sent&box=$userbox&messege=$mid'>".$subj."</a></td>";
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