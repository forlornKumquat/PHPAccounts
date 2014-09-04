<?php
session_start();
if(!isset($_SESSION['user'])){
	$_SESSION['message'] = "How did you even get here?"
	header('Location: login.php');
	die();
}

if(isset($_POST['submit'])){

	include 'includes/dbVar.php';
	include 'includes/dbCon.php';

	$aQuery = "UPDATE userData SET ";
	$delimiter = "";
	$updated = "";

	if(isset($_POST['ufirstname']))
	{
		$aVar = $db->mysql_real_escape_string($_POST['ufirstname']);
		$aQuery = $aQuery . "uFirstName='" . $aVar . "'";
		$delimeter = ",";
		$updated = "First Name";
	}
	if(isset($_POST['ulastname']))
	{
		$aVar = $db->mysql_real_escape_string($_POST['ulastname']);
		$aQuery = $aQuery . $delimiter . "uLastName='" . $aVar . "'";
		$delimeter = ",";
		$updated = $updated . $dellimiter . "Last Name";
	}
	if(isset($_POST['ubirthdate']))
	{
		//set regular expression here
	}

	$aQuery = $aQuery . " WHERE uEmail='" . $_SESSION['USER'] . "';";
	if (!mysqli_query($db, $aQuery)){
		die('Error: ' . mysqli_error($db));
	}
	$_SESSION['message']="Updated: " . $updated . ".";
	header('Location: index.php');
}