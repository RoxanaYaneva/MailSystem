<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection and select the default database
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} else {
	mysqli_select_db($conn, "maildb");
}

?>