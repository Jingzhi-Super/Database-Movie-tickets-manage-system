<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="logo home.png" media="screen">
		<title>
			ticket book condition
		</title>


		
		<style>

		#body{
			background-color: #EFF9EC;
		}

		    #table{
                width: 35%;
                
                color:black;
                text-align:center;
                padding:10px;
                left: 135%;
    			top: 4%;

                }

			#image{
			
    		padding: 23px;
    		opacity: 0.15;
 
    		position: absolute;
    		left: 0%;
    		top: 4%;

    border-radius: 10px;
    text-align: right;
			}

        </style>
	</head>
	<body id='body'>
		<br>

		<?php
		    session_start();
		    $customer=$_SESSION['username'];
		    $currentdate=$_SESSION['current_date'];
		    // session_write_close();
		    $title = $_GET["title"];
			// Generate sql
			$sql = "select movie.title, movie.plot_description, movie.release_date,director.name as dn from movie, movie_director, director where movie.ID=movie_director.movie_id and movie_director.director_id=director.ID and movie.title='$title'";
			$sql1 = "select star.name as sn from movie, movie_star, star where movie.ID=movie_star.movie_id and movie_star.star_id=star.ID and movie.title='$title'";
			$sql2 = "select ID from movie where movie.title='$title'";
			
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
			echo "<p><font color=\"red\">Movie found!</font></p>";
         
			// Run a sql
			$result = $conn->query($sql);
			$result1 = $conn->query($sql1);
			$result2 = $conn->query($sql2);
			$str = "http://localhost/home.php";
			if ($result&&$result1&&$result2)
			{   
				while($row2 = $result2->fetch_assoc()) {
                        $movieid=$row2['ID'];
			        }
			    // output corresponding pictures
			    //echo "<div id=\"section1\">";
			    echo "<div id='image'><img width=\"480\" height=\"650\" src=\"$movieid.png\"></div>";
                
                // output information
				echo "<table id='table' width=\"500\" border=\"1\">";
			    while($row = $result->fetch_assoc()) {
                    foreach($row as $key=>$value)
					{   
						if($key=="title"){
						echo "<tr>";
						echo "<td><font color=\"red\">movie title</font></td>";
					    echo "<td>$value</td>";
					    echo "<tr>";
					    }
					    if($key=="plot_description"){
                        echo "<tr>";
						echo "<td><font color=\"red\">plot description</font></td>";
					    echo "<td>$value</td>";
					    echo "<tr>";
					    }
					    if($key=="release_date"){
                        echo "<tr>";
						echo "<td><font color=\"red\">release date</font></td>";
					    echo "<td>$value</td>";
					    echo "<tr>";
					    }
					    if($key=="dn"){
                        echo "<tr>";
						echo "<td><font color=\"red\">director</font></td>";
					    echo "<td>$value</td>";
					    echo "<tr>";
					    }
					}
			}   
			    echo "<tr>";
			    echo "<td><font color=\"red\">actors</font></td>";
			    echo "<td>";
			    while($row1 = $result1->fetch_assoc()) {
                    foreach($row1 as $key1=>$value1)
					{   
                        echo "$value1."."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					}
			}
			    echo "</td>";
			    echo "<tr>";
			    echo "</table>";
			    $result->free();
			}
			else
			{
				echo "Something Wrong!"."<a href=$str>back to home page!</a>";
			}
		?>
	</body>
</html>