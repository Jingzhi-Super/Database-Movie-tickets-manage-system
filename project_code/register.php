<html>
	<head>
		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
		<?php
			$ID = $_POST["Register"];
			$password = $_POST["Password"];
			$birth = $_POST["Birth"];
			$phone = $_POST["Phone"];
			// check for special characters
			if (!ctype_alnum($ID)) {
				echo "The string $testcase does not consist of all letters or digits.<br>";
				echo "<a href='register.html'>Return<a/>";
			} else {
			// echo $phone;
			if ($ID == "" ||$password == "" ||$birth == "" ||$phone == "")
			{
				$str = "http://localhost/register.html";
				echo "Please provide your account and password. "."<a href=$str>return to login</a>";
			} elseif (DateTime::createFromFormat('Y-m-d', $birth) == FALSE) {
				$str = "http://localhost/register.html";
				echo "Wrong birth date! "."<a href=$str>return to login</a>";
			} elseif (strlen($phone) != 10) {
				$str = "http://localhost/register.html";
				echo "Invalid phone number! "."<a href=$str>return to login</a>";
			} elseif (strlen($password)<6) {
				$str = "http://localhost/register.html";
				echo "Password too short! Has to be at least 6 digits. "."<a href=$str>return to login</a>";
			} elseif (strlen($password)>11) {
				$str = "http://localhost/register.html";
				echo "Password too long! Has to be at most 11 digits. "."<a href=$str>return to login</a>";
			} else {
				// Generate sql
				$sql = "insert into customer VALUES "."('$ID', '$password', '$birth', '$phone')";
				
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
				echo "<p><font color=\"red\">See Result Below</font></p>";
			 
				// Run a sql
				$result = $conn->query($sql);
				if ($result)
				{   
					$str = "http://localhost/login.php";
					echo "Successful!"."<a href=$str>return to login</a>";
				}
				else
				{
					$str = "http://localhost/register.html";
					echo "Your account has been used!"."<a href=$str>Try again!</a>";
				}
			}
			}
		?>
	</body>
</html>