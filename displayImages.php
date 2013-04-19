<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
<!-- 		<link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
		<title>Albums</title>
	</head>
	
	<body>
		<h1 id="titleHeader"><a href="displayImages.php">My Web Gallery</a></h1>
		
		<?php
			require("db.php"); 
			$sql = new mysqli("localhost", $username, $password, $db);
				
			$q = "SELECT url FROM finalPics";
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
		
	</body>
</html>