<?php
session_start();
if(isset($_POST['submit'])){

	//connect to database as guest
	include 'includes/dbVar.php';
	include 'includes/dbCon.php';

	$myEmail = $db->real_escape_string($_POST['uemail']);

	$aQuery = "SELECT * FROM users WHERE uEmail = '" . $myEmail . "';";

	if($result = $db->query($aQuery)){
		//just one row, so no need to loop
		$row = $result->fetch_assoc();
		$result->free();

		//verify password matches and send to main page
		if($row['uPassword'] == hash('sha512', $_POST['upassword'])){
			$_SESSION['user']=$row['uEmail'];
			//SEND to the happy place
			//check for account status changes and set $_SESSION['message'] if any
			header('Location: index.php');
			die();
		}
		else {
			//echo "<hr>Thou shall not pass!";
			//route back and say "RONG"
			$_SESSION['message']="Invalid password.";
			unset($_SESSION['user']);
			//advance fail counter and maybe the date
			header('Location: login.php');
			die();
		}
	}
	$db->close();
}
