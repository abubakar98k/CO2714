<!DOCTYPE html>
<html>
	<head>
		<title>Edit Record</title>
	</head>
	<body>
		<?php
			include 'connect.php';
			if (isset( $_POST['submit'] ))
			{
				$updatequery ="UPDATE users SET firstname=?, surname=?, email=?, password=? WHERE id=?";
				$stmt = $mysqli->prepare($updatequery);
				$stmt->bind_param('sssss', $_POST['fname'], $_POST['sname'], $_POST['email'], $hashedPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT), $_GET['id']);
			
				if (!$stmt->execute()) 
				{
					echo "Error: ".$mysqli->error;
				}
				else 
				{
					echo "<p>Record updated successfully</p>";
					echo "<a href=\"users.php\">Go Back to Users</a>";
				} 
				$mysqli->close();
			}
			else
			{
				$populatequery = "SELECT * FROM users WHERE ID='".$_GET['id']."'"; //we should go replace this with a prepared statement too!
				$result = $mysqli->query ($populatequery);
				if ($result)
				{
					if ($result->num_rows > 0) //if there are more than 0 rows, print out the rows.
					{
						while($row = $result->fetch_assoc()) 
						  {
							  $fn = $row['firstname'];
							  $sn = $row['surname'];
							  $em = $row['email'];
							  $pw = $row['password'];
						  }
				  
					}
				}
		?>
		<h1>Edit record:</h1>
		<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
			Firstname: <input class="form-control" type="text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/>
			<br></br>
			Surname: <input class="form-control" type="text" id="sname" name="sname" value="<?php echo"$sn"; ?>"/>
			<br></br>
			Email: <input class="form-control" type="text" id="email" name="email" value="<?php echo"$em"; ?>"/>
			<br></br>
			Password: <input class="form-control" type="password" id="pass" name="pass" value="<?php echo"$pw"; ?>"/>
			<br></br>
			<input class="btn btn-primary" type="submit" id="submit" name="submit" value="submit"/>
		</form>	
	</body>
</html>
<?php
	}
?>
