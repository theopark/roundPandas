<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
<!-- 		<link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
		<title>Scrapbook</title>
	</head>
	
	<body>
		<?php 
			require("menu.php");
			require("helpfulFunctions.php");
			require_once("db.php");
		?>
		
		<div>
			<h1>scrapbook</h1>
			
			<?php
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
	
				$q = "SELECT url FROM Photos";
				$query = $sql->query($q);
	
				print("<div id='albumPhotosDiv'>");
				while ($result = $query->fetch_assoc()) {
					print("
						<img class='albumImgImg' src='images/" . $result["url"] . "' /><br />
						<br /><br /><br />
					");
				}
				print("</div>");
				$sql->close();
			?>
		</div>
	</body>
</html>