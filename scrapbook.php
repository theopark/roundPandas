<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
	<script src="assets/js/jquery.js"></script>	
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
	
				//TO-DO: easiest way is to stick caption in alt field
				print("<div id='albumPhotosDiv'>");
				while ($result = $query->fetch_assoc()) {
					$alt = "something";
					print("
						<img class='albumImgImg' alt='". $alt . "' src='images/" . $result["url"] . "' /><br />
						<br /><br /><br />
					");
				}
				print("</div>");
				$sql->close();
			?>
		</div>
		<script type="text/javascript">
			$("img").hover(
				function(){
					var caption = $(this).attr("alt");
					$(this).wrap('<div id="caption_div" />');
					$("#caption_div").append("<p>" + caption "</p>");
				},
				function(){
					$(this).unwrap();
				});
		</script>
	</body>
</html>