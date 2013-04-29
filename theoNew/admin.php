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
				print("<p>Below is the profile info for the e-board members. Feel free to change/edit it here.  To do so, update the form entry and submit.</p>");
				$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
				
				// get all eboard members
				$query = "SELECT * FROM Eboard";
				$eResult = $sql->query($query);
				$arrNetidToMID = array();
				while ($eRow = $eResult->fetch_assoc()) { 
					// get info from table
					$mID = $eRow["mID"];
					$firstName = $eRow["firstName"];
					$lastName = $eRow["lastName"];
					$email = $eRow["email"];
					$bio = $eRow["bio"];
					$url = $eRow["url"];
					$major = $eRow["major"];
					$year = $eRow["year"];
					$arrNetidToMID[$bio] = $mID; 

					// use bio to get the bio from the eboard folder
					$fp = fopen("textFiles/$bio.txt", "r");
					$b = "";
					while (!feof($fp)) {
						$b .= fgets($fp);
					}
					
					print("
						<form method='post' action='' enctype='multipart/form-data' >
							FirstName: <input type='text' name='fName' value='$firstName' /><br />
							Last Name: <input type='text' name='lName' value='$lastName' /><br />
							Email: <input type='text' name='email' value='$email' /><br />
							Year: <input type='text' name='year' value='$year' /><br />
							Major: <input type='text' name='major' value='$major' /><br />
							Bio:<br /><textarea name='bio'>$b</textarea><br />
							Profile Image: <input type='file' name='imageToUpdate' /><br /><br />
							<input type='submit' name='update$bio' value='Update my profile!' /><br />
						</form>
						<img class='bioPic' width='200' height='200' src='eboard/$url' alt='$url' />
					"); // #note used width/height in line above. use 'bioPic' class in css instead 

	
					if (isset($_POST["update$bio"])) { // update the information
						$fn = $_POST["fName"];
						$ln = $_POST["lName"];
						$e = $_POST["email"];
						$y = $_POST["year"];
						$m = $_POST["major"];
// 						print("<h1>LET'S UPDATE THE INFORMATION $fn $ln $e $y $m " . $arrNetidToMID[$bio] . "</h1>");
						if (file_exists($_FILES['imageToUpdate']['name'])) {
							$imgName = $_FILES['imageToUpdate']['name'];
							move_uploaded_file($_FILES['imageToUpdate']['tmp_name'], "eboard/" . $imgName);
						} else {
							$imgName = $url;
						}
	
						$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
						// update Eboard table values
						$q = "UPDATE Eboard SET firstName='$fn', lastName='$ln', email='$e', url='$imgName', year=$y, major='$m' WHERE mID=" . $arrNetidToMID[$bio];
						$sql->query($q);
	
						// bio text file
						$fp = fopen("textFiles/$bio.txt", "w");
						$text = $_POST["bio"];
						fputs($fp, $text);
						fclose($fp);
						
						
					}
				} // end while loop
				$sql->close();
			}

				
			
			if (isset($_POST["logout"])) {
				print("<h1>You are now logged out.</h1>");
				print("<h3>You will not have special privileges upon accessing different pages.</h3>");
				$_SESSION["adminLoggedIn"] = false;
			}
		?>
	</body>
</html>