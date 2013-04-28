<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
<!-- 		<link rel="stylesheet" type="text/css" href="styles/style.css" /> -->
		<title>Title Goes Here</title>
	</head>
	
	<body>
		<?php 
			require("menu.php");
			require_once("helpfulFunctions.php");
		?>
		
		<?php 
			// load up all the profiles of the e-board members (name, major, year, pic, bio)
			$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
			$query = "SELECT * FROM Profile";
			$result = $sql->query($query);
			while ($row = $result->fetch_assoc()) {
				$pid = $row["pID"];
				$bio = $row["bio"];
				$mID = $row["mID"];
				
				// use pid to get image url
				$query = "SELECT url FROM Photos WHERE pID=$pid";
				$res = $sql->query($query);
				$r = $res->fetch_row();
				$url = $r[0];
				
				// use bio to get the bio from the eboard folder
				$fp = fopen("textFiles/$bio", "r");
				$b = "";
				while (!feof($fp)) { 
					$b += fgets($fp);
				}
				
				// use mID to get the name/major/year
				$query = "SELECT * FROM Members WHERE mID=$mID";
				$res = $sql->query($query);
				$r = $res->fetch_assoc();
				$year = $r["year"];
				$name = $r["name"];
				$major = $r["major"];
				
				print("<h3>$name</h3>");
				print("<h4>$major  $year</h4>");
				print("<img src='$url' alt='$name' />");
				print("<p>$b</p>");
			}
			$sql->close();

/*
			// if the admin is logged in, let them change their info
			// type in only the data you want to change
			print("<h3>Update/edit your info</h3>");
			print("<p>You must enter your username and password, but all other fields are optional. 
					  Only fields for which data has been provided will be updated.</p>");
			print("
				<form method='post' action='' 
			");
*/
			
		?>
	</body>
</html>