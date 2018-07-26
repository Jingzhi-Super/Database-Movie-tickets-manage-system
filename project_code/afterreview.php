<?php
        session_start();
		
		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$database="project";
		
		$conn = new mysqli($servername, $username, $password,$database);
		
		$review=$_POST['review'];
		$star = $_POST['star'];
		if ($review == "")
		{
			echo "Please review the movie"."<a href='review.php'> Return</a>";
		} else {
			$sql="insert into review(movie_id,customer_id,context,stars,review_time) values(".$_SESSION['movie_id'].",'".$_SESSION['username']."','".$review."',".$star.",'".date("Y-m-d")."')";

			$result=$conn->query($sql);

			if ($result)
				{   
					echo "Successful!"."<a href='home.php'>Return to home.</a>";
				}
				else
				{
					echo "Something wrong."."<a href='review.php'>Try again!</a>";
				}
			}
	
    ?>



    


