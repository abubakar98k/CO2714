<?php
	session_start();
	if($_SESSION['login'] === TRUE)
	{
		echo "<p>Welcome ".$_SESSION['user'];
	}
	else
	{
		header("Location:login.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>First PHP</title>
	</head>
	<body>
		<?php
			echo "<h1> Here is some HMTL</h1>";
			echo "<p>Hello ".$_SESSION['user']. ", pleased to meet you!</p>";
		?>
	</body>
</html>
