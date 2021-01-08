<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include 'connect.php';
		if (!isset($_POST['submit']))
		{
			echo "<p>ERROR form was NOT submitted</p>";
		}
		else
		{
			$sql= "INSERT INTO users (firstname, surname, email, password) VALUES ('".$_POST['fname']."','".$_POST['sname']."','".$_POST['email']."','".$hashedPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT)."')";
			
			if(!$mysqli->query($sql))
			{
				echo "Error: ". $mysqli->error;
			}
			else
			{
				echo "<p>Success</p>";
				echo '<a href="users.php">Click there to view users page</a>';
			}
			$mysqli->close();
		}
	}
	else 
	{
		?>
			<!DOCTYPE html>
			<html>
			<head>
			<title>Add user</title>
			</head>
			<body>
			<h1>Add record</h1>
			<form action="newuser.php" method="post" >
			Firstname: <input type="text" id="fname" name="fname"/>
			Surname: <input type="text" id="sname" name="sname"/>
			Email: <input type="text" id="email" name="email"/>
			Password: <input type="password" id="pass" name="pass"/>
			<input type="submit" id="submit" name="submit" value="submit"/>
			</form>
			</body>
			</html>
		<?php
	}
?>
