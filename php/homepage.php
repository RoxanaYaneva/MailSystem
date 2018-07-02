<?php

include_once("connect.php");
session_start();
if ($_SESSION["s_user"] == "") {
	header('Location:../index.php');
}

$_SESSION["s_box"] = $_REQUEST["box"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/homepage.css">
	<link rel="stylesheet" type="text/css" href="../css/tables.css">
</head>
<body>
	<div class="wrapper">
		<div class="top">
			<div class="left">
				<img id="logo" src="../logo.png">
			</div>
			<div class="right">
				<h2> Mail:
					<?php
					echo $_SESSION["s_user"];
					?>
				</h2>
				<h2> You are currently in box: <?php echo $_SESSION["s_box"]; ?> </h2>
			</div>
		</div>
		<div class="bottom">
			<div class="left">
				<nav>
					<ul>
						<li>
							<a style="color: white; text-transform: uppercase;" href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=send">Send</a>
						</li>
						<li>
							<a href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=inbox">Inbox</a>
						</li>
						<li>
							<a href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=sent">Sent</a>
						</li>
						<li>
							<a href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=trash">Trash</a>
						</li>
						<li>
							<a href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=settings">Settings</a>
						</li>
						<li>
							<a href="usermails.php">Back to the boxes</a>
						</li>
						<li>
							<a href="homepage.php?box=<?php echo $_SESSION['s_box'];?>&page=logout">Logout</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="right">
				<?php
					@$page = $_REQUEST["page"];

					if ($page == "send") {
						include_once('send.php');
					}
					if ($page == "inbox") {
						include_once('inbox.php');
					}
					if ($page == "sent") {
						include_once('sent.php');
					}
					if ($page == "trash") {
						include_once('trashbin.php');
					}
					if ($page == "logout") {
						session_unset();
						session_destroy();
						header('Location:../index.php');
					}
				?>

				<?php
					$box_id = $_REQUEST["box"];
					@$mid = $_REQUEST["messege"];
					@$from = $_REQUEST["from"];
					$query = "";

					if ($mid && $from) {
						if ($from == "inbox") {
							$query = "SELECT * FROM inbox WHERE msg_id = '$mid' AND rec_box_id = '$box_id'";
						} else if ($from == "sent") {
							$query = "SELECT * FROM sent WHERE msg_id = '$mid' AND cr_box_id = '$box_id'";
						}
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_object($result);
						echo "<h3> Subject: ".$row->subject."</h3><br>";
						echo "<h4> ".$row->msg_body."</h4>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>

