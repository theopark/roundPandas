<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
<!-- 		<link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
		<title>Get Involved</title>
	</head>
	
	<body>
		<?php 
			require("menu.php");
			require_once("helpfulFunctions.php");
		?>
		
		<div>
			<h1>get involved</h1>
			
			<?php 
				require("listserveSignup.php");
			?>
			
			
		</div>
	</body>
</html>