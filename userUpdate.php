<?php
session_start();
if(!isset($_SESSION['user'])){
	$_SESSION['message'] = "How did you even get here?"
	header('Location: login.php');
	die();
}

include 'includes/dbVar.php';
include 'includes/dbCon.php';

if(isset($_POST['']))
{
	
}