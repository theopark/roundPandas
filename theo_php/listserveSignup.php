<?php
	//session_start();
	require_once("helpfulFunctions.php");
?>
	<form method="post" action="">
		Sign up to be in our email list serve!<br />
		<input type="text" name="first" value="First Name" />
		<input type="text" name="last" value="Last Name" />
		<input type="text" name="email" value="netid@cornell.edu" />
		<input type="submit" name="submit" value="Sign Me Up!" />
	</form>
	
<?php 
	if (isset($_POST["submit"])) {
		$first = $_POST["first"];
		$last = $_POST["last"];
		$email = $_POST["email"];
		
		if (validNetid($email) && !find($email, "ListServe", "email") && validName($first) && validName($last)) {
			addToListServe($first, $last, $email);
		}
	}
	
	// if the admin is signed in, show the form to update the text file
	if (isset($_SESSION["adminLoggedIn"]) && $_SESSION["adminLoggedIn"]) {
?>
	<form method="post" action="">
		Click here to update the text file with the emails!
		<input type="submit" name="getTxt" value="Get Update Text File!" />
	</form>
	
<?php 
	}
	
	if (isset($_POST["getTxt"])) {
		getUpdatedListServeTextFile();
	}
?>