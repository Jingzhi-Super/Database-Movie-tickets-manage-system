<html>
	<head>
		<title>
			ticket book condition
		</title>
	</head>
	<body>
		<?php
		    session_start();
		    $customer=$_SESSION['username'];
		    $reviewID = $_GET['id'];

			if ($customer == "" ||$reviewID == "")
			{
				die("Please choose one review to delete or login in administrator identity.");
			}
			
			// Generate sql
			$sql = "call Review_Modify('$customer',$reviewID)";
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
			echo "<p><font color=\"red\">review modified as below:</font></p>";
         
			// Run a sql
			$result = $conn->query($sql);
			$str = "http://localhost/home_admin.php";
			$str1 = "http://localhost/check_review.php";
			if ($result)
			{   
			    echo "review is deleted successfully"."<a href=$str1><img width=\"50\" height=\"50\" src=\"back.png\"></a>";
			}
			else
			{
				echo "Something Wrong!"."<a href=$str><img width=\"50\" height=\"50\" src=\"home.jpg\"></a>";
			}
		?>
	</body>
</html>