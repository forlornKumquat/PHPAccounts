<?php
session_start();
unset($_SESSION['user']);
if(isset($_POST['submit'])){
	$mEmail = $_POST['uemail'];
	$mName = $_POST['uname'];
	$mPass = hash('sha512', $_POST['upassword']);
	$mPass2 = hash('sha512', $_POST['upassword2']);

	//connect to database as guest
	include 'includes/dbVar.php';
	include 'includes/dbCon.php';

	$mEmail = mysqli_real_escape_string($db, $mEmail);
	$mName = mysqli_real_escape_string($db, $mName);
	$mPass = mysqli_real_escape_string($db, $mPass);

	$aQuery = "SELECT * FROM users WHERE uEmail = '" . $mEmail . "';";
	$result = $db->query($aQuery);

	if(mysqli_num_rows($result) > 0){
		$_SESSION['message'] = "User associated with this email already exists.";
		header('Location: register.php');
	}
	else if($mPass != $mPass2){
                $_SESSION['message'] = "Password does not match.";
                header('Location: register.php');
                die();
        }
	else {
		$aQuery = "INSERT INTO users (uEmail,uName,uPassword) VALUES ('$mEmail', '$mName', '$mPass')";
		if (!mysqli_query($db, $aQuery)){
			die('Error: ' . mysqli_error($db));
		}
		//insert email into userData table
		$aQuery = "INSERT INTO userData (uEmail,uName) VALUES ('$mEmail','$mName')";
		if (!mysqli_query($db, $aQuery)){
			die('Error: ' . mysqli_error($db));
		}
		$_SESSION['user']=$mEmail;
		$_SESSION['message']="Thank you for joining.";
		header('Location: index.php');
	}
	mysqli_close($db);
}
