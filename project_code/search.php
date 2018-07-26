<!DOCTYPE html>
<html>
	<head>
	</head>
	<style type="text/css">
	#table{
	
	background-color:#F9F7FC;
    color:black;
    text-align:left;
    padding:6px;
    line-height:30px;
    height:100%;
    width:95%;
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

			$search_type=$_POST["search_type"];
			$search=$_POST["search"];

			if ($search_type == 'Rating'&&$search<>"") {
				echo "Results ordered by average ratings of our costomes in descending order";
				$sql = "select distinct movie.title, movie.plot_description from movie, review where movie.id=review.movie_id 
						group by movie.id having avg(review.stars) >= ".$search."-1 and avg(review.stars) <= ".$search."
						order by avg(review.stars) desc";
			};
			if ($search_type == 'Rating'&&$search=="") {
				$sql = "select distinct movie.title, movie.plot_description from movie, review where movie.id=review.movie_id";
			};

			if ($search_type == 'Director'&&$search<>""){
				$sql = "select distinct movie.title, movie.plot_description
					 from director,movie_director,movie
					 where movie.id=movie_director.movie_id and movie_director.director_id=director.id 
						and director.name like '%".$search."%'";
			};
			if ($search_type == 'Director'&&$search==""){
				$sql = "select distinct movie.title, movie.plot_description
					 from director,movie_director,movie
					 where movie.id=movie_director.movie_id and movie_director.director_id=director.id";
			};
			if ($search_type == 'Plot'&&$search<>""){
				$sql = "select distinct movie.title, movie.plot_description
					 from movie where movie.plot_description like '%".$search."%'";
			};
			if ($search_type == 'Plot'&&$search==""){
				$sql = "select distinct movie.title, movie.plot_description
					 from movie";
			};
			if ($search_type == 'Genre'&&$search<>""){
				$sql = "select distinct movie.title, movie.plot_description from movie, genre, movie_genre
					    where movie.id=movie_genre.movie_id and movie_genre.genre_id=genre.id
						and genre.type like '%".$search."%'";
			};
			if ($search_type == 'Genre'&&$search==""){
				$sql = "select distinct movie.title, movie.plot_description from movie, genre, movie_genre
					    where movie.id=movie_genre.movie_id and movie_genre.genre_id=genre.id";
			};
			if ($search_type == 'Star'&&$search<>""){
				$sql = "select distinct movie.title, movie.plot_description from movie, star, movie_star
						where movie.id=movie_star.movie_id and movie_star.star_id=star.id 
						and star.name like '%".$search."%'";
			}
			if ($search_type == 'Star'&&$search==""){
				$sql = "select distinct movie.title, movie.plot_description from movie, star, movie_star
						where movie.id=movie_star.movie_id and movie_star.star_id=star.id";
			}
			if ($search_type == 'Comments'&&$search<>"") {
				echo "Results ordered by frenquency of the searched keywords.";
				$sql = "select distinct movie.title, movie.plot_description from movie, review where movie.id=review.movie_id 
						and review.context like '%".$search."%' group by movie.title order by count(*) desc";
			};
			if ($search_type == 'Comments'&&$search=="") {
				$sql = "select distinct movie.title, movie.plot_description from movie, review where movie.id=review.movie_id";
			};
			
			$result=$conn->query($sql);
			$detail="http://localhost/movie.php";
			$buy="http://localhost/buy.php";
			
			if ($result->num_rows == 0) {
				echo "<p><font color=\"red\">No results!</font></p>";
			}
			else {
			echo "<table id='table' width=\"600\" border=\"2\">";

			while($row = $result->fetch_assoc()) {
				$title=$row['title'];
				echo "<tr >";
                echo "<td><a href='$detail?title=$title' target='_blank'> Detail</a></td>";
				foreach($row as $key=>$value)
					{
                        if($key=="title")
						echo "<td>$value</a></td>";
					    else
					    echo "<td>$value</td>";
					}
				echo "<td><a href='$buy?title=$title'>buy ticket</a></td>";
				echo "<tr>";
			}
			echo "</table>";
			$result->free();
			}

			// Close connection
			mysqli_close($conn);

			
?>
</body>
</html>