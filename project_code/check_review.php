<html>
	<head>
		<title>
		Check tickets
		</title>
	</head>
	<body>
	<a href='home_admin.php'><img width="50" height="50" src="home.jpg"></a><br>

		<?php
			session_start();
			if ($_SESSION['log_in']==0){
				header('Location: login_admin.php');
			}
			$title = $_SESSION['title'];
			
			// Generate sql
			$sql = "select review.id as ID, customer_id, context, stars, review_time from review, movie where 
			movie.id=review.movie_id and movie.title='".$title."'";
			// echo $sql;

			// Create connection
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$database = "project";
			$conn = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			echo "<p><font color=\"red\">Connected successfully</font></p>";
         
			// Run sql
			$result = $conn->query($sql);
			
			if ($result)
			{
				echo "Reviews for this movie:";
				echo "<table border=1px>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td><a href='afteradmindelete.php?id=".$row['ID']."'>Delete</a>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			echo "<br>";
			
			// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>