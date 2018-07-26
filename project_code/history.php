<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="logo home.png" media="screen">
		<title>
			History
		</title>
		
	</head>
	<style type="text/css">
		
		#table{
	background-color:#C9F7FC;
    color:black;
    text-align:left;
    padding:6px;
    line-height:30px;
    height:100%;
    width:55%;
    float:left;
    padding:10px;
    align="left"
    margin: 10px;
		}

	#frame{
	
	background:url(search.png);
	background-repeat: no-repeat;
    color:black;
    text-align:left;
    padding:10px;
    line-height:30px;
    height:100%;
    width:100%;
	}

	</style>

	<body id="frame">
			<a href="home.php">Return to home page<a/>

<?php
			session_start();
			if ($_SESSION['log_in']==1) {
			$user_name=$_SESSION['username'];
		}
			
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$database="project";


			// Create connection
			$conn = new mysqli($servername, $username, $password,$database);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			echo "<p><font color=\"red\">See Result Below</font></p>";

			$sql="select distinct movie.title,movie.ID from movie, ticket
			where movie.ID=movie_id and customer_id='".$user_name."' and ".$_SESSION['current_date'].">=ticket.date_id";			

				$result=$conn->query($sql);
				$result1=$conn->query($sql);

				if ($result1->num_rows == 0) {
					echo "<p><font color=\"red\">No results!</font></p>";
				}
				else {
					echo "<table style='text-align:center' id='table' width=\"600\" border=\"2\">";
					while($row = $result->fetch_array()) {
					
					$title=$row['title'];
					
					echo "<tr >";
					echo "<td><a href='review.php?movie_id=".$row['ID']."'>Review</a>";
                        	if($key=="title"){
							echo "<td>$title</a></td>";
						}
					    	else{
					    	echo "<td>$title</td>";
					    }
							echo "<tr>";
						}
					echo "</table>";
					$result->free();
				}			
			mysqli_close($conn);

			
?>
</body>
</html>