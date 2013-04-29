<?php
	//session_start();
	// THIS PAGE CONTAINS FUNCTIONS TO BE USED ACROSS PAGES
	require("db.php");
	
	// validate the username so that we don't get bad input 
	function validateUsername($name) {
		// dummy for now #note
		return $name;
	}
	
	// hash and clean the password entry
	function hashPW($password) {
		return hash("sha256", $password);
	}
	
	// returns true if the item $item is in table $table under the column $column
	function find($item, $table, $column) {
		global $DB_Username, $DB_Password, $DB_Name;
		$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
		$query = "SELECT $column FROM $table";
		$result = $sql->query($query);
		while ($row = $result->fetch_row()) {
			if ($row[0] == $item) {
				$sql->close();
				return true;
			}
		}
		$sql->close();
		return false;
	}
	
	// returns true if $username, $password, is in the table $table
	function userExists($username, $password, $table) {
		global $DB_Username, $DB_Password, $DB_Name;
		$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
		$query = "SELECT username, password FROM $table";
		$result = $sql->query($query);
		while ($row = $result->fetch_assoc()) {
			$user = $row["username"];
			$pass = $row["password"];
			if ($username == $user && $password == $pass) {
				$sql->close();
				return true;
			}
		}
		$sql->close();
		return false;
	} 
	
	// returns true if the admin is logged in with special privileges
	function adminAccess() {
		if (isset($_SESSION["adminLoggedIn"])) {
			return $_SESSION["adminLoggedIn"];
		}
		return false;
	}
	
	// returns true if the email address if a valid cornell netid address
	function validNetid($addr) {
		if (preg_match('/[a-zA-Z]{2,}[0-9]+@cornell.edu/', $addr)) {
			return true;
		}
		return false;
	}
	
	// returns true if the name contains only letters
	function validName($name) {
		if (preg_match('/[a-zA-Z]+/', $name)) {
			return true;
		}
		return false;
	}
	
	// adds this person to the list serve, if they're not already in it
	function addToListServe($first, $last, $email) {
		global $DB_Username, $DB_Password, $DB_Name;
		if (!find($email, "ListServe", "email")) {
			$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
			$query = "INSERT INTO ListServe VALUES ('$first', '$last', '$email')";
			$sql->query($query);
			$sql->close();
		}
	}
	
	// gets all the email addresses from the ListServe table and sticks it in a text file, comma delimited
	function getUpdatedListServeTextFile() {
		global $DB_Username, $DB_Password, $DB_Name;
		$sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);
		$query = "SELECT email FROM ListServe";
		$result = $sql->query($query);
		$fh = fopen("listserve.txt", 'w');
		while ($row = $result->fetch_row()) {
			fwrite($fh, $row[0] . ", ");
		}
		fclose($fh);
		$sql->close();
	}
	
?>