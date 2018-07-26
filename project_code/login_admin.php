<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOG IN </title>
 
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <script type="text/javascript" src="login.js"></script>


</head>
 
<body>
<div id="login_frame">
 
    <p id="image_logo"><img src="logo home.png" width="60" height="60"></p>
 
    <form method="POST" action="login_admin.php">
        <p><label class="label_input">User:</label><input type="text" name="User" class="text_field"/></p>
        <p><label class="label_input">Password:</label><input type="password" name="Password" class="text_field"/></p>
        <div style="width:60%;padding:0;margin:0;float:left;box-sizing:border-box;" id="login_control">
            <br><input type="submit" id="btn_login" value="Log In" name="flag"><br>
        </div>
    </form>
	
	<form method="post" action="register.html">
        <div style="width:40%;padding:0;margin:0;float:right;box-sizing:border-box;" id="login_control">
            <br><input type="submit" id="btn_login" value="Sign Up"/><br>
        </div>
    </form>
	
</div>

 <?php
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database="project";
	$conn = new mysqli($servername, $username, $password, $database);
	session_start();
	$_SESSION['current_date'] = $_POST['Date'];
	$_SESSION['log_in'] = 0;
	if ($_POST['flag']) {	
		$login =  "SELECT * FROM administrator WHERE id = '".$_POST['User']."' and password = '".$_POST['Password']."'";
		$result = $conn->query($login);
		if ($result->num_rows == 1) {
			$_SESSION['log_in'] = 1;
		}
		if ($_SESSION['log_in']==1) {
			$_SESSION['username'] = $_POST['User'];
			header('Location: home_admin.php');
		}
		else {
			echo "<p><font color=\"red\">Log in failed!</font></p>";
		};
	};
 ?>
	
</body>
</html>