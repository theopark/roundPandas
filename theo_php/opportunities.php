<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
<!-- 		<link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
		<title>Opportunities</title>
	</head>
	
	<body>
		<?php 
			require("menu.php");
			require_once("helpfulFunctions.php");
		?>
		
		<div>
			<h1>opportunities</h1>
			
			<?php
				// display the opportunities (blurb and link, maybe person to contact)
				$fp = fopen("textFiles/opportunities", "r");
				$line = fgets($fp); // should be "-_-"
				print("<ul>");
				while (!feof($fp)) {
					$line = fgets($fp); // title
					print("<li>$line<li>");
					$line = fgets($fp); // url
					print("<ul><li>$line</li>"); // indented bullets
					$line = fgets($fp); // either blurb or "-_-"
					if ($line == "-_-") {
						print("</ul>");
					} else {
						print("<li>$line</li></ul>");
						$line = fgets($fp);
					}
				}
				print("</ul>");
				
				
				// form to update (add blurb and link (required), contact person/email/phone (optional))
				if (adminAccess()) {
					print("
						<form method='post' action=''>
							<input type='text' name='url' value='URL Link' required />
							<input type='text' name='title' value='Title of Event' required />
							<textarea cols='40' rows='5' name='blurb'></textarea>
							<input type='submit' name='addOp' value='Add Opportunity!' />
						</form>
					");

					if (isset($_POST["addOp"])) {
						// get the info from the form
						$url = $_POST["url"]; // #note should do some sanitization on these inputs
						$title = $_POST["title"];
						$blurb = $_POST["blurb"];
						
						// write to the file
						$fp = fopen("textFiles/opportunities.txt", 'a');
						fputs($fp, "-_-"); // use separator in between opportunities
						fputs($fp, $title);
						fputs($fp, $url);
						if (strlen($blurb) > 0) fputs($fp, $blurb);
						fputs($fp, "-_-");
					}
				}
				
				// do we want to remove them too?
				
			?>
		</div>
	</body>
</html>