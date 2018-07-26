<html>
	<head>
		<title>
			ticket book condition
		</title>
	</head>
	<body>
		<?php
		    session_start();
			if ($_SESSION['log_in']==0) {
				// $_SESSION['log_in'] = 0;
				header('Location: login.php');
			}
		    $customer=$_SESSION['username'];
		    $currentdate=$_SESSION['current_date'];
		    $title = $_COOKIE["afterbuy"];
			$cinema = $_POST["cinema_name"];
			$Date = $_POST["Date"];
			$time = $_POST["period"];
			$sql="select date.date from date where date.ID=$currentdate";
			// Create connection
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$database = "project";
			$conn = new mysqli($servername, $username, $password, $database);
			$conn1 = new mysqli($servername, $username, $password, $database);
			$conn2 = new mysqli($dervername, $username, $password, $database);
			$result2 = $conn2->query($sql);
			if ($result2)
			{   
			    while($row3 = $result2->fetch_assoc()) {
                        $date1=$row3['date'];
			}
			    $result2->free();
			}
			
			if ($cinema == "" ||$Date == "" ||$time == "")
			{
				die("Please provide all information for your purchase.");
			}
			
			if ($date1>=$Date)
			{
				die("please choose ticket that's not outdated");
			}
			// Generate sql
			$sql1 = "select ifticketavailable('$title','$Date','$cinema','$time') as item";
			

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			echo "<p><font color=\"red\">Your Purchase Result:</font></p>";
         
			// Run a sql
			$result = $conn->query($sql1);
			$str = "http://localhost/home.php";
			if ($result)
			{   
			    while($row = $result->fetch_assoc()) {
                        $ticketID=$row['item'];
			}
			    $result->free();
			    if($ticketID==null){
			    	echo "<p><font color=\"red\">Tickets sold out or not available</font></p>";
			    	echo "<p><a href=$str>back to home page!</a></p>";
			    }
			    else{
			    	$sql2 = "call buyticket('$ticketID', '$customer')";
			    	$result1 = $conn1->query($sql2);
			    	if($result1){
                       echo "<p><font color=\"red\">Ticket booked successfully!</font></p>";
                       echo "<p><font color=\"red\">Check your ticket:'$ticketID', '$cinema', '$Date','$time'</font></p>";
                       echo "<a href=$str>back to home page</a>";
			    	}
			    	else{
                       echo "Sorry for System crash!"."<a href=$str>Please buy your ticket again!</a>";
			    	}
			    }
			}
			else
			{
				echo "Something Wrong!"."<a href=$str>back to home page!</a>";
			}
			
			
		?>
	</body>
</html>