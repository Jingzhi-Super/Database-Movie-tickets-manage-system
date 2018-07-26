<?php
session_start();
$date = $_SESSION['current_date'];
// $_$SESSION['login_in'] = 1;
$servername = "localhost";
      $username = "root";
      $password = "mysql";
      $database = "project";
      $conn = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "";
      switch($_GET[action]){
		
		case 'fbap': $sql = "
		select movie.title as n, avg(star.popularity) as t from movie,star,movie_star where movie.ID=movie_star.movie_id and star.ID=movie_star.star_id group by movie.ID;";
        break;
        case 'mpff': $sql = "select movie.title as n, count(*) as t from ticket,movie where ticket.movie_id=movie.ID and ticket.customer_id is not null and $date>=ticket.date_id group by movie.ID;";
        break;
        
        case 'rating': $sql = "select movie.title as n, avg(review.stars) as t from movie, review, date
		where movie.id=review.movie_id and date.date=review.review_time and $date>= date.ID
		group by movie.title order by avg(review.stars) desc";
        break;
        case 'comment': $sql = "select movie.title as n, count(review.id) as t from movie, review, date
		where movie.id=review.movie_id and date.date=review.review_time and $date>= date.ID
		group by movie.title order by count(review.id) desc";
        break;     

		case 'age': $sql = "select movie.title as n, AVG(2018-DATE_FORMAT(customer.birth,'%Y')) as t 
		from customer,ticket,movie
		where ticket.customer_id=customer.ID  and movie.ID=ticket.movie_id and $date>=ticket.date_id
		group by movie.title;";
        break;  
		case 'cinema': $sql = "select cinema.name as n, COUNT(ticket.ID) as t
		from ticket,movie,cinema
		where customer_id is not null and movie.ID=ticket.movie_id and $date>=ticket.date_id
		and cinema.ID=ticket.cinema_id
		group by cinema_id;";
        break;  

		default: $sql= "select movie.title as n, count(*) as t from ticket,movie where ticket.movie_id=movie.ID and ticket.customer_id is not null and $date>=ticket.date_id group by movie.ID;";
      }
      $result = $conn->query($sql);
      $output = "letter\tfrequency\n";
      if ($result){
        while($row = $result->fetch_assoc())
        {
            $output .= $row['n']."\t".$row['t']."\n"; 
        }
      }
      $result->free();
      echo $output;
      // Close connection
      mysqli_close($conn);
?>
