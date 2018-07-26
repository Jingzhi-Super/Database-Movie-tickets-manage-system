<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="logo home.png" media="screen">
	<title>
		Buy
	</title>
</head>
<style>

body {
    background-image: url("login.jpg");
    background-size: 100%;
    background-repeat: no-repeat;

    background-color: rgba(230, 245, 255, 0.5);
}
 
#buy_frame {
    width: 400px;
    height: 350px;
    padding: 13px;
 
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -200px;
    margin-top: -200px;
 
    background-color: rgba(230, 235, 255, 0.5);
 
    border-radius: 10px;
    text-align: center;
}

form p > * {
    display: inline-block;
    vertical-align: middle;
}
 

 
#image_logo {
    margin-top: 24px;
}
 
.label_cinema {
    font-size: 15px;
    font-family: Times;
 
    width: 67px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3CD8FF;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.label_period {
    font-size: 15px;
    font-family: Times;
 
    width: 67px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3CD8FF;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.label_date {
    font-size: 15px;
    font-family: Times;
 
    width: 67px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3CD8FF;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

select {

 	height: 30px;
    text-align: center;
    text-align-last: center;
    
}

.cinema_name{
	width: 278px;
    height: 28px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border: 0;
}

.period{
	width: 278px;
    height: 28px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border: 0;
}


 
#btn_buy {
    font-size: 14px;
    font-family: Times;
 
    width: 100px;
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
 
    width: 100px;
    height: 28px;
    line-height: 28px;
    text-align: center;
 
    color: white;
    background-color: #3BD9FF;
    border-radius: 6px;
    border: 0;
	float: right;
 
}
 

 
#buy_control {
    padding: 0 28px;
}

</style>
<body>
<?php
    session_start();
    if (!$_SESSION['log_in']) {
	    $_SESSION['log_in'] = 0;
	    header('Location: login.php');
    }
    session_write_close();
    $title = $_GET['title'];
    $cookie_name = "afterbuy";
    setcookie($cookie_name, $title);
?>
<div id="buy_frame">
 
    <p id="image_logo"><img src="logo home.png" width="60" height="60"></p>
 
    <form action="afterbuy.php" method="POST">
 	
        <p><label class="label_cinema">Cinema:</label><select name="cinema_name" style="width:207px">
        	<option value="Row House Cinema">Row House Cinema</option>
        	<option value="SouthSide Works">SouthSide Works</option>
        	<option value="Waterworks Cinemas">Waterworks Cinemas</option>
        	<option value="The Rangos Giant Cinema - Carn">The Rangos Giant Cinema - Carn</option>
        	<option value="Harris Theater">Harris Theater</option>
        	</select>
        </p>

        <p><label class="label_date">Date:</label>
            <div>
            <input type="text" name= "Date" class="demo-input" placeholder="Please choose date" id="test1">

            <script src="laydate/laydate.js"></script> 

            <script>
            lay('#version').html('-v'+ laydate.v);


            laydate.render({
            elem: '#test1' 
            ,lang:'en'
            });
            </script>
            </div>
        </p>
        
        

        <p><label class="label_period">Time:</label><select name="period" style="width:207px">
        	<option value="9:00-12:00">9:00-12:00</option>
        	<option value="12:00-15:00">12:00-15:00</option>
        	<option value="15:00-18:00">15:00-18:00</option>
        	<option value="18:00-21:00">18:00-21:00</option>
        	<option value="21:00-00:00">21:00-00:00</option>
        	<option value="00:00-03:00">00:00-03:00</option>
        </select>
        </p>
    

        <div style="width:50%;padding:0;margin:0;float:left;box-sizing:border-box;" id="buy_control">
            <br><input type="submit" id="btn_buy" value="Buy Now"/>
        </div>
		
		<div style="width:30%;padding:0;margin:0;float:left;box-sizing:border-box;" id="back_control">
			 <br><input type="button" id='btn_back' onclick="javascript:location.href='home.php'"  value="Back" />
        </div>
    </form>

</div>
</body>