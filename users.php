<!DOCTYPE html>
<html>
	<head>
		<title>Users</title>
	</head>
	<body>
		<?php
			include 'connect.php';
			
			$sql = "SELECT ID, firstname, surname, email FROM users";
			$result = $mysqli->query ($sql);
			if ($result)
			{
				if ($result-> num_rows > 0)
				{
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Firstname</th>";
					echo "<th>Surname</th>";
					echo "<th>Email</th>";
					echo "</tr>";
					while($row = $result->fetch_assoc())
					{
						// Output data of each row
						echo "<table>";
						echo "<tr>";
						echo "<td>".$row['ID']."</td>";
						echo "<td>".$row['firstname']."</td>";
						echo "<td>".$row['surname']."</td>";
						echo "<td>".$row['email']."</td>";
						echo '<td><a href= "edit.php?id='.$row["ID"].'">Edit</a></td>';
						echo '<td><a href= "delete.php?id='.$row["ID"].'">Delete</a></td>';
						echo "</tr>";
					}
					echo "</table>";
			} else
			{
				echo "0 Results";
			}
			$result->close();
			$mysqli->close();
			}
			
		?>
	</body>
</html>


