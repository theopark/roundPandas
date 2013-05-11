<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	
	<head>
		<title>Scrapbook</title>
		<link rel="stylesheet" href="styles/scrapbook.css" type="text/css"/>
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
			require("helpfulFunctions.php");
			require_once("db.php");
		?>
		
		<div id="bottomcontent">
			<div class="textbox">
				<h1>Scrapbook</h1>

				<?php
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);

				$q = "SELECT (pID, url) FROM Photos";
				$query = $sql->query($q);

				//TO-DO: easiest way is to stick caption in alt field
				print("<div id='albumPhotosDiv'>");
				while ($result = $query->fetch_assoc()) {
					$pid = $reult["pID"]
					$q = "SELECT caption FROM PhotosInAlbum WHERE pID = " . $pID;
					$query = $sql->query($q)
					$caption = $query->fetch_assoc();
					$alt =  $caption["caption"];
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

		</div>
			
		<div id= "footer">
			<p>All right reserved.  Made by Team Round Pandas.</p>
		</div>
	</div>
	</body>			
</html>