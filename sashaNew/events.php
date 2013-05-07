<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<link rel="stylesheet" href="styles/opportunities.css" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<title>Events</title>
	</head>
	
	<body>
		<div id= "wrapper">
			<div id="content">
				<?php
					require "sidebar.php"; 
				?>
		
				<div id="cbody">
					<div id="header">			
						<?php
							require "menu.php"; 
						?>
					</div>
					
					<div id="center">
						<div id="calendar">
						<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=cornell.acsuw%40gmail.com&amp;color=%23875509&amp;src=cornell.edu_uopdt2h7u35en887ibrq79hfus%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=America%2FNew_York" style=" border-width:0 " width="700" height="500" frameborder="0" scrolling="no"></iframe>
						</div>
						
					</div>
				</div>
				
				<div id="footer">
				
				</div>
		</div>
	</body>
</html>