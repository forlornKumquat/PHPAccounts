<?php
session_start();
if(!isset($_SESSION['user'])){
	$_SESSION['message'] = "How did you even get here?";
	header('Location: login.php');
	die();
}

if(isset($_POST['submit'])){

	include 'includes/dbVar.php';
	include 'includes/dbCon.php';

	$aQuery = "UPDATE userData SET ";
	$delimiter = "";
	$updated = "";

	if(($_POST['ufirstname']) != "")
	{
		$aVar = $db->real_escape_string($_POST['ufirstname']);
		$aQuery .= "uFirstName='" . $aVar . "' ";
		$updated = "First Name";
		$delimiter = ",";
	}
	if(($_POST['ulastname']) != "")
	{
		$aVar = $db->real_escape_string($_POST['ulastname']);
		$aQuery .= $delimiter . "uLastName='" . $aVar . "' ";
		$updated .= $delimiter . "Last Name";
		$delimiter = ",";
	}
	if(($_POST['ubirthdate']) != "")
	{
		//set regular expression here
	}

	$aQuery = $aQuery . " WHERE uEmail='" . $_SESSION['user'] . "';";

	if (!mysqli_query($db, $aQuery)){
		die('Error: ' . mysqli_error($db));
	}

	$_SESSION['message']="Updated: " . $updated . ".";
	header('Location: account.php');
}