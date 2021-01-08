<?php
$servername = "localhost";
$username = "student";
$password = "website";
$dbasename = "firstlab";

//Create Connection
$mysqli = new mysqli($servername, $username, $password, $dbasename);

//Check Connection
if ($mysqli->connect_errno)
{
	printf("Connection failed: %s\n", $mysqli->connecct_error);
	exit();
}
?>
