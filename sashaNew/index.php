<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>Cornell ACM-W</title>
		<link rel="stylesheet" href="styles/index.css" type="text/css"/>
		
	</head>
	
	<body>
	<div class= "wrapper">
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
				<img src="images/groupPicture.jpg" width="698px" height="" />
				
				<div id="squares">
					<div id="left">
						<h1>Our Mission </h1>
						<p>
							To bring together the women in computing at Cornell. We seek to expand the opportunities and successes of women in CS. We hope to encourage prospective computer science majors, and build a community of budding female technologists. We hope to make incredible role models more accessible as we seek to create a network for women undergraduates, faculty, and staff, and promote interaction on academic, social and professional issues.

						</p>
					</div>
					
					<div id="right">
						
							</br><a href="http://www.whitehouse.gov/administration/eop/ostp/women"><img src="http://img2.timeinc.net/people/i/2009/database/michelleobama/michelle_obama300.jpg" class="image"height="65%" width="45%"/></a>
							
							<h2 class="quote"></br>"If we’re going to out-innovate and out-educate the rest of the world, <span class='high'>we’ve got to open doors for everyone.</span> We need all hands on deck, and that means clearing hurdles for women and girls as they navigate careers <span class='high'>in science, technology, engineering, and math.</span>”
							</br></br></br></br>
							-- First Lady Michelle Obama, September 26, 2011
							</h2>
					</div>
				</div>
				
			</div>
		</div>
		
		<div id="footer">
		</div>
	</div>
	</div>
	</body>			
</html>