<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="styles/index.css" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	<div id= "wrapper">
	
		<div id="banner">
			<a href="index.php"><img src= "images/logo1.jpg" alt= "ACM-W Logo" width="230" height= "75"/></a><br />
		</div>

		<!-- Navigation bar -->
		<?php 
			require("menu.php");
			// require("helpfulFunctions.php");
		?>
		<!-- Navigation bar -->
		
		<div id="mainpic">
				<img src= "images/computers.jpg" alt= "Computers" height="350" width= "900"/><br />
		</div>

	<div id="twocols">
		<div id="left">
			<div class="textbox">

				<h1>ACSU-W</h1>
				<p>ACSU-W is the Cornell branch of the academic association, ACM-W, Association for Computing Machinery - Women. Their objective is to bring together women in the various computing fields at Cornell - Computer Science, Information Science, Electrical Engineering, etc. They are geared at helping to develop a community of female technologist to serve as a resource for women currently in computing disciplines and young women hoping to enter the field.</p>
			</div>
		</div>

		<div id="middle">
			<div class="textbox">

				<h1>Mission</h1>

				<p>ACM-W supports, celebrates, and advocates internationally for the full engagement of women in all aspects of the computing field, providing a wide range of programs and services to ACM members and working in the larger community to advance the contributions of technical women.</p>
			</div>
		</div>

		<div id="right">
			<div class="textbox">

				<h1>Vision</h1>

				<p>We strive to educate women in the opportunities pertaining to disciplines including Electrical and Computer Engineering, Computer Science, Information Science and many more!</p>
			</div>
		</div>
			
			
		<div id= "footer">
			<p>All right reserved.  Made by Team Round Pandas.</p>
		</div>
		</div>
	</div>
	</body>			
</html>