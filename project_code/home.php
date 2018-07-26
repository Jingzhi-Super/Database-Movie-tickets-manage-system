<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" type="image/x-icon" href="logo home.png" media="screen">
	<title>
		Home
	</title>
</head>

<?php
		session_start();
		if ($_SESSION['log_in']==1) {
			echo 'Welcome! '.$_SESSION['username'];
		}
		else {
			$_SESSION['log_in'] = 0;
			header('Location: login.php');
		}

	?>

<style>
#header {
    background:url(background.png);
    background-color:black;
    color:white;
    text-align:center;
    padding:1px;
}

#navigation {
    line-height:30px;
    height:650px;
    width:11%;
    float:left;
    padding:5px;	
    background-color:grey;
    color:white;
    background:url(background.png);
     
}

#section1 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;
    background-color:#D5F0F1;	 	 
}

#section2 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;  
    background-color:#F5E0F4;      
}

#section3 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px; 
    background-color:#9FB5DF;       
}

#section4 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;   
    background-color:#8A2E43;     
}

#section5 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px; 
    background-color:#9FB5DF;       
}

#section6 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;	
    background-color:#173145; 	 
}

#section7 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;
    background-color:#C75762;        
}

#section8 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;   
    background-color:#F2F9EC;     
}

#section9 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;  
    background-color:#2D8665;      
}

#section10 {
    text-align: center;
    width:16%;
    float:left;
    padding:10px;  
    background-color:#5EB4C9;      
}

#section11 {
    background:url(background.png);
    text-align: center;
    width:85%;
	height:8px;
    float:left;
    padding:15px;   
    color:white;     
}

#section12 {
    background:url(background.png);
    text-align: center;
    width:85%;
	height:8px;
    float:left;
    padding:15px; 
    color:white;       
}

#bottom {
    background:url(background.png);
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
     	 
}

</style>
</head>

<body>

	
<div id="header">
	<h1><font size="10">Immortal</font></h1>
    <form action="search.php" method="POST">
			Search type:<select name="search_type" />
			<option value="Rating">Rating</option>
			<option value="Plot">Plot</option>
			<option value="Comments">Comments</option>
			<option value="Genre">Genre</option>
			<option value="Star">Star</option>
			<option value="Director">Director</option>
			 
           Search: <input type="text" name="search" required="required"/>
          <input type="submit" value="submit" />
    </form>
</div>

<div id="navigation">
	<div onclick="location.reload();location.href='history.php';">
	History</div>
	<div onclick="location.reload();location.href='viz.php'">
	Trending</div>
	<div onclick="location.reload();location.href='upcoming.php'">
	Upcoming</div>
	<div onclick="location.reload();location.href='login.php'">
	Log out</div>
</div>

<div id="section11">
	&darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &nbsp; 1-15th &nbsp; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr;
</div>

<div id="section1">
	<div id=1><img width="200" height="250" src="1.png"></div>
	Mama mia:here we go again<br>
	<?php
	$title = 'Mamma Mia! Here We Go Again';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
	
</div>

<div id="section2">
    <div id=2><img width="200" height="250" src="2.png"></div>
	Ant-man and Wasp<br>
	<?php
	$title = 'Ant-Man and the Wasp';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section3">
    <div id=3><img width="200" height="250" src="3.png"></div>
	Pacific Rim 2<br>
	<?php
	$title = 'Pacific Rim: Uprising';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section4">
    <div id=4><img width="200" height="250" src="4.png"></div>
	Avengers 3<br>
	<?php
	$title = 'Avengers: Infinity War';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section5">
    <div id=5><img width="200" height="250" src="5.png"></div>
	Iron man 3<br>
	<?php
	$title = 'Iron Man 3';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section12">
		&darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &nbsp; 16-30th &nbsp; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr; &darr;
</div>


<div id="section6">
    <div id=6><img width="200" height="250" src="6.png"></div>
	Captain America 3<br>
	<?php
	$title = 'Captain America: Civil War';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section7">
    <div id=7><img width="200" height="250" src="7.png"></div>
	Her<br>
	<?php
	$title = 'Her';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section8">
    <div id=8><img width="200" height="250" src="8.png"></div>
	Cabin in the woods<br>
	<?php
	$title = 'The Cabin in the Woods';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section9">
    <div id=9><img width="200" height="250" src="9.png"></div>
	Thor 3<br>
	<?php
	$title = 'Thor: Ragnarok';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="section10">
    <div id=10><img width="200" height="250" src="10.png"></div>
	Ant-man <br>
	<?php
	$title = 'Ant-Man';
	echo "<td><a href='buy.php?title=".$title."'>buy tickets</a>";
	?>
</div>

<div id="bottom">
www.immortal.com
</div>

</body>
</html>
