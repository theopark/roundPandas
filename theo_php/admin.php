<?php
	session_start();
	// THIS PAGE IS A STANDALONE TO LET THE ADMIN LOG IN
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
		
		<form method="post" action="">
			Sign up an admin account<br />
			<input type="text" name="username" value="Username" />
			<input type="text" name="password" value="Password" />
			<input type="submit" name="adminSignup" value="Submit" />
		</form>
		
		<form method="post" action="">
			Log In<br />
			<input type="text" name="username" value="Admin username" />
			<input type="text" name="password" value="Password" />
			<input type="submit" name="submit" value="Log In With Admin Privileges" />
		</form>
		
		<form method="post" action="">
			Log Out<br />
			<input type="submit" name="logout" value="Log Out" />
		</form>
		
		<!-- loginMessage to be used for confirmation/error messages (#note: set by jquery) -->
		<span id="loginMessage"></span>

		<?php 
/*
			if (!isset($_POST["edit"])) {
		?>
		
		<form method="post" action="" enctype="multipart/form-data" >
			Create your e-board bio!<br />
			<input type="text" name="username" value="Site Username" />
			<input type="password" name="password" value="Site Password" />
			<input type="text" name="name" value="Name" />
			<input type="text" name="year" value="Year" />
			<input type="text" name="major" value="Major" />
			Select your image:
			<input type="file" name="imageToUpload" /><br />
			Bio:
			<input type="textarea" name="bio" width="400" height="200" />
			
			Already have a bio? Load/edit your bio here!<br />
			<input type="text" name="username" value="Site Username" />
			<input type="text" name="password" value="Site Password" />
			<input type="submit" value="Edit My Bio!" name="edit" /> 
		</form>
		
		<?php 
			} else { // we want to edit the bio. load the info
				// get member ID
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
				$user = $_POST["username"];
				$pass = hashPW($_POST["password"]);
				$q = "SELECT mID FROM Admin WHERE username=$user AND password=$pass";
				$result = $sql->query($q);
				$row = $result->fetch_rows();
				$mID = $row[0];
				
				// user member ID to get photo ID, bio text file name
				$q = "SELECT pID, bio FROM Profile WHERE mID=$mID";
				$result = $sql->query($q);
				$row = $result->fetch_assoc();
				$pID = $row["pID"];
				$bio = $row["bio"];
				
				// use member ID to get name
				$q = "SELECT name, year, major FROM Members WHERE mID=$mID";
				$result = $sql->query($q);
				$row = $result->fetch_assoc();
				$profileName = $row["name"];
				$year = $row["year"];
				$major = $row["major"];
				
				// use photo ID to get url
				$q = "SELECT url FROM Photos WHERE pID=$pID";
				$result = $sql->query($q);
				$row = $result->fetch_row();
				$url = $row[0];
				
				// get the contents bio from the file using the bio text file name
				$fp = fopen("eboard/$bio", 'r');
				$b = "";
				while (!feof($fp)) {
					$b += fgets($fp);
				}
				
				// close the connection
				$sql->close();
				
				print('<form method="post" action="" enctype="multipart/form-data" >');
				print('<input type="text" name="name" value="' . $profileName . '" />');
				print('<input type="text" name="year" value="' . $year . '" />');
				print('<input type="text" name="major" value="' . $major . '" />');
				print("Select your image: (See below for your current image)");
				print('<input type="file" name="imageToUpload" /><br />');
				print("Bio:");
				print('<input type="textarea" width="400" height="200" value="' . $b . '" />');
				print('</form>');
				print("<p>");
				print("<img src=\'images/" . $_POST["username"] . "' alt='your image' />");
				print("</p>");
			}
			
			// if we are trying to create a bio for the first time
			if (isset($_POST["edit"])) {
				$user = $_POST["username"];
				$pass = $_POST["password"];
				$name = $_POST["name"];
				$year = $_POST["year"];
				$major = $_POST["major"];
				$img = $_FILES['imageToUpload']['name'];
				$bio - $_POST["bio"];
				
				// save the user profile image to the eboard and upload to database
				move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "eboard/" . $img);
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
				$query = "INSERT INTO Photos VALUES ('', '" . $img . "')";  //"UPDATE Photos SET url='" . $img . "'";
				$sql->query($query);
				$sql->close();

				// save the bio as a text file
				$fh = fopen("eboard/" .$user  . ".txt", 'w');
				fwrite($fh, $bio);
				fclose($fh);
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
				$query = "INSERT INTO ";
				$result = $sql->query($query);
				$sql->close();
			}
*/
		?>
		
		<?php 
			// sign up for an admin account
			if (isset($_POST["adminSignup"])) {
				$user = validateUsername($_POST["username"]);
				if (!find($user, "Admin", "username")) {
					$pw = hashPW($_POST["password"]);
					$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
					$query = "INSERT INTO Admin VALUES ('', '$user', '$pw')";
					$result = $sql->query($query);
					$sql->close();
				}
			} 
		
			// check if the admin is properly logged in and set session variables accordingly
			if (isset($_POST["submit"])) {
				print("<h1>submitted</h1>");
				$user = $_POST["username"];
				$user = validateUsername($user);
				$password = hashPW($_POST["password"]);
				
				if (userExists($user, $password, "Admin")) { // if this person is an admin/e-board member	
					$_SESSION["adminLoggedIn"] = true;
					// display confirmation message #note
				} else {
					print("<h1>The admin is not logged in</h1>");
					$_SESSION["adminLoggedIn"] = false;
					// display error message #note
				}
			} 

			if (isset($_SESSION["adminLoggedIn"]) && $_SESSION["adminLoggedIn"]) {
				// show the member's profile info and let them edit it
				print("<h2>e-board member profiles</h2>");
				print("<p>Below is the profile info for the e-board memebers. Feel free to change/edit it here.  To do so, update the form entry and submit.</p>");
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
				
				// get all eboard members
				$query = "SELECT * FROM Profile";
				$eResult = $sql->query($query);
				while ($eRow = $result->fetch_assoc()) { 
				
					// info
					$mID = $eRow["mID"];
					$pid = $eRow["pID"];
					$bio = $eRow["bio"];
					
					// get mID
					//$query = "SELECT mID FROM Admin WHERE username='$user' AND password='$password'";
					//$result = $sql->query($query);
					//$row = $result->fetch_assoc();
					//$mID = $row["mID"];
					
					// use mID to get more information
					//$query = "SELECT * FROM Profile WHERE mID=$mID";
					//$result = $sql->query($query);
					//$row = $result->fetch_assoc();
					//$pid = $row["pID"];
					//$bio = $row["bio"];
				
					// use pid to get image url
					$query = "SELECT url FROM Photos WHERE pID='$pid'";
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
					$query = "SELECT * FROM Members WHERE mID='$mID'";
					$res = $sql->query($query);
					$r = $res->fetch_assoc();
					$year = $r["year"];
					$name = $r["name"];
					$major = $r["major"];
				
					print("<h3>Name: $name</h3>");
					print("<h4>Major/year: $major  $year</h4>");
					print("<img src='$url' alt='$name' />");
					print("<p>Bio:\n$b</p>");
					$sql->close();
					
					print("
						<form method='post' action='' enctype='multipart/form-data' >
							<input type='text' name='name' value='$name' />
							<input type='text' name='year' value='$year' />
							<input type='text' name='major' value='$major' />
							<input type='textarea' name='bio' width='400' height='200' value='$bio' />
							<input type='file' name='imageToUpload' /><br />
							<input type='submit' name='update' value='Update my profile!' />
						</form>
						<img src='eboard/$url' alt='$url' />
					");
	
					if (isset($_POST["update"])) { // update the information
						print("<h1>LET'S UPDATE THE INFORMATION</h1>");
						$n = $_POST["name"];
						$y = $_POST["year"];
						$m = $_POST["major"];
	
						$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
						// name/year/major to Members table
						$q = "UPDATE Members SET 'name'=$n, 'year'=$y, 'major'=$m WHERE mID=$mID";
						$sql->query($q);
	
						// bio text file
						$fp = fopen("textFiles/$bio", "w");
						$text = $_POST["bio"];
						fputs($fp, $text);
						fclose($fp);
						
						// image to image folder/Photos table
						move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "eboard/" . $img);
						$query = "UPDATE Photos SET 'url'=$img' WHERE pID=$pid";  //"UPDATE Photos SET url='" . $img . "'";
						$sql->query($query);
						
						$sql->close();
					}
				} // end while loop
			}

				
			
			if (isset($_POST["logout"])) {
				print("<h1>the admin wants to log out</h1>");
				$_SESSION["adminLoggedIn"] = false;
			}
		?>
	</body>
</html>