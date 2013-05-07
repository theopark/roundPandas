<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>About</title>
		<link rel="stylesheet" href="styles/about.css" type="text/css"/>
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
				<h1>ACM-W at Cornell</h1>
				<p>ACSU-W is the Cornell branch of the academic association, ACM-W, Association for Computing Machinery - Women. 
				The organization was founded at Cornell in September 2012 and has has a short history. Their objective is to bring together women in the various computing fields at Cornell - Computer Science, 
				Information Science, Electrical Engineering, etc. They are geared at helping to develop a community of female 
				technologist to serve as a resource for women currently in computing disciplines and young women hoping to enter 
				the field. </p>

				<p>The Association for Computing Machinery was founded as the Eastern Association for Computing Machinery at a meeting at Columbia University in New York on September 15, 1947. Its creation was the logical outgrowth of increasing interest in computers as evidenced by several events, including a January 1947 symposium at Harvard University on large-scale digital calculating machinery; the six-meeting series in 1946-47 on digital and analog computing machinery conducted by the New York Chapter of the American Institute of Electrical Engineers; and the six-meeting series in March and April 1947, on electronic computing machinery conducted by the Department of Electrical Engineering at Massachusetts Institute of Technology. In January 1948, the word "Eastern" was dropped from the name of the Association. In September 1949, a constitution was instituted by membership approval.</p>
			</div>

		
			<div class="textbox">
				<h1>Mission</h1>
				<p>ACM-W supports, celebrates, and advocates internationally for the full engagement of women in all aspects of the computing field, providing a wide range of programs and services to ACM members and working in the larger community to advance the contributions of technical women.</p>
			</div>

			<div class="textbox">
				<h1>Vision</h1>
				<p>ACM-W vision is to create a community which encourages the full engagement of women in all aspects of the computing field and spur interest and a network of resources and colleagues who share the same passion as each of our members does	.</p>
			</div>

			<div class="textbox">
				<h1>ACM-W: A National Network</h1>
				<p>ACM, the Association for Computing Machinery is the world&#39;s largest educational and scientific computing society, uniting educators, researchers and professionals to inspire dialogue, share resources and address the field&#39;s challenges. ACM strengthens the computing profession&#39;s collective voice through strong leadership, promotion of the highest standards, and recognition of technical excellence. ACM supports the professional growth of its members by providing opportunities for life-long learning, career development, and professional networking. With over 100,000 members from over 100 countries, ACM works to advance computing as a science and a profession.</p>
			</div>

		</div>
			
		<div id= "footer">
			<p>All right reserved.  Made by Team Round Pandas.</p>
		</div>
	</div>
	</body>			
</html>