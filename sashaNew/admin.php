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
<!--	
		<form method="post" action="">
			Sign up an admin account<br />
			<input type="text" name="username" value="Username" />
			<input type="text" name="password" value="Password" />
			<input type="submit" name="adminSignup" value="Submit" />
		</form>
-->
		
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
			// sign up for an admin account (commented out b/c debating whether needed)
			/*
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
			*/
		
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