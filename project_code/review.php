<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="logo home.png" media="screen">
    <title>Review</title>
 
    
   <style type="text/css">
       #frame{
    width: 400px;
    height: 320px;
    padding: 13px;
 
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -200px;
    margin-top: -300px;
 
    background-color: rgba(230, 235, 255, 0.5);
 
    border-radius: 10px;
    text-align: center;
       }

       form p > * {
    display: inline-block;
    vertical-align: middle;
}

#table{
    
    width: 420px;
    height: 160px;
    margin-top: 50px;
    margin-left: -10px;
 
    float:left;
	color:black;  
 
    background-color: rgba(230, 235, 255, 0.5);
 
    border-radius: 1px;
    text-align: center;
}

       form p > * {
    display: inline-block;
    vertical-align: middle;
}

#review{
	
	font-size: 18px;
    font-family: Times;

    margin-left: -200px;
    margin-top: 80px;
    width: 180px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3CD8FF;
    border-radius: 6px;
    border: 0;
 
    float: left;

}

.label_input {
    font-size: 15px;
    font-family: Times;
 
    width: 97px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3CD8FF;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
 
.text_field {
    width: 278px;
    height: 88px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border: 0;
}

#btn_login {
    font-size: 14px;
    font-family: Times;
 
    width: 120px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3BD9FF;
    border-radius: 6px;
    border: 0;
 
    float: right;
}

#btn_back {
    font-size: 14px;
    font-family: Times;
 
    width: 120px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3BD9FF;
    border-radius: 6px;
    border: 0;
 
    float: right;
 
}


   </style>


</head>
 
<body>

  
<div id="frame">
 
    <p id="image_logo"><img src="logo home.png" width="60" height="60"></p>
 
    <form method="post" action="afterreview.php">
 
        <p><label class="label_input">Review here:</label><input type="text" name="review"  class="text_field"/></p> 
        <input type="radio" name="star" value=0> 0
		<input type="radio" name="star" value=1 > 1
		<input type="radio" name="star" value=2> 2
		<input type="radio" name="star" value=3 checked> 3
		<input type="radio" name="star" value=4> 4
		<input type="radio" name="star" value=5> 5
		<p>
		<input type="Submit" id="btn_login" value="Submit" /><br>
    </form>
	<div>

    <form method="post" action="history.php">
       
        <input type="Submit" id="btn_back" value="Back"/>
    
    </form>
</div>

<?php
        session_start();
		$user_name = $_SESSION['username'];
		$_SESSION['movie_id'] = $_GET['movie_id'];
		
		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$database="project";
		
		$conn = new mysqli($servername, $username, $password,$database);
		$reviewsql = "select context, stars, review_time from review where customer_id='".$user_name."' and movie_id=".$_SESSION['movie_id']."";
		$review_result = $conn->query($reviewsql);
		if ($review_result->num_rows == 0) {
			echo "No previous review for this film.";
		} else {
			echo "<p id='review'>Your previous review:</p>";
				echo "<table id='table' border=1px style='table-layout:fixed'>";
				echo "<tr>";
				echo "<td>context<td>star<td>time";
				while($row = $review_result->fetch_assoc())
				{
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
		};
    ?>
	
</body>
</html>


