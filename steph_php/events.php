<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>About</title>
		<link rel="stylesheet" href="styles/events.css" type="text/css"/>
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
		
		<div id="bottomcontent">
			<div class="textbox">
				<h1>Calendar of Events</h1>
				<p>ACSU-W has many upcoming events.</p>
			</div>

		<div class = "calendar">
			<object data="https://www.google.com/calendar/embed?title=Upcoming%20Events&amp;
			height=600&amp;wkst=1&amp;bgcolor=%239999ff&amp;data=cornell.edu_08oe73ogs70vb8299s8iuruts0%40group.calendar.google
			.com&amp;color=%232952A3&amp;ctz=America%2FNew_York" style=" border-width:0 " width="900" height="600"></object>
		</div>

			<div class="textbox">
				<h1>Events List</h1>

				<p>This will highlight three of four events that club will have in the future with blurbs and descriptions.</p>
			</div>

			</div>

		</div>
			
		<div id= "footer">
			<p>All right reserved.  Made by Team Round Pandas.</p>
		</div>
	</div>
	</body>			
</html>