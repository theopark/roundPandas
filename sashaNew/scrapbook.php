<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<link rel="stylesheet" href="styles/opportunities.css" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<title>Scrapbook</title>
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
						
						
						
						
					</div>
				</div>
				
				<div id="footer">
				</div>
			

		</div>
	</body>
</html>
	

				<?php
// 				NOTE: WE COMMENTED THIS OUT B/C WE DON'T HAVE PHOTOS FILLED IN OUR DB YET (THE FIRST CLIENT EVENT IS TOMORROW, SO WE'LL ADD PICS AFTER THAT
/*
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
				
			// should be taken out of this segment 	
			<div>	
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
	
*/
				?>
		
