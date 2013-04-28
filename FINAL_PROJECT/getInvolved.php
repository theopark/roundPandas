<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>Get Involved</title>
		<link rel="stylesheet" href="styles/getInvolved.css" type="text/css"/>
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

		<div id="mainpic">
				<img src= "images/groupPicture.jpg" alt= "Computers" height="350" width= "900"/><br />
		</div>

		<!-- Navigation bar -->
		
		<?php 
			// require("listserveSignup.php");
		?>

			<div class="textbox">
				<h1>Join Now</h1>
				<p>Sign up for our list-serve below so we can keep you up to date with the latest news and events that the ACM-W Cornell Chapter is up to.</p>
			</div>
			

			<div class="textbox">
				<h1>Become a mentor</h1>
				<p>Sign up for our list-serve below so we can keep you up to date with the latest news and events that the ACM-W Cornell Chapter is up to.</p>
			</div>

			
		<div id= "footer">
			<p>All right reserved.  Made by Team Round Pandas.</p>
		</div>
	</div>
	</body>			
</html>