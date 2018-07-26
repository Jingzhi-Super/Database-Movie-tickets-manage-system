<html>
	<head>
		<title>
			ticket refund condition
		</title>
	</head>
	<body>
		<?php
		    session_start();
		    $customer=$_SESSION['username'];
		    $ticket_ID=$_GET['ticket_id'];
			// Generate sql
			$sql1 = "select customer_id from ticket where ID='$ticket_ID'";
			// echo $sql1;
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$database = "project";

			$conn = new mysqli($servername, $username, $password, $database);
			$conn1 = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			echo "<p><font color=\"red\">Your Refund Result:</font></p>";
         
			// Run a sql
			$result = $conn->query($sql1);
			$str = "http://localhost/home.php";
			if ($result)
			{   
			    while($row = $result->fetch_assoc()) {
                        $customerID=$row['customer_id'];
			}
			    $result->free();
			    if($customerID==null){
			    	echo "<p><font color=\"red\">Tickets has already been refunded or you never booked it before!</font></p>";
			    	echo "<p><a href=$str><img width=\"50\" height=\"50\" src=\"home.jpg\"></a></p>";
			    }
			    else{
			    	$sql2 = "call refundticket('$ticket_ID', '$customer')";
					// echo $sql2;
			    	$result1 = $conn1->query($sql2);
			    	if($result1){
                       echo "<p><font color=\"red\">Ticket refunded successfully!</font></p>";
                       echo "<a href=$str><img width=\"50\" height=\"50\" src=\"home.jpg\"></a>";
			    	}
			    	else{
                       echo "Sorry for System crash!"."<a href=$str><img width=\"50\" height=\"50\" src=\"back.png\"></a>";
			    	}
			    }
			}
			else
			{
				echo "Something Wrong!"."<a href=$str><img width=\"50\" height=\"50\" src=\"back.png\"></a>";
			}
		?>
	</body>
</html>