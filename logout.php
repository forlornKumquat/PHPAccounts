<?php
session_start();
	unset($_SESSION['user']);
	$_SESSION['message'] = "You have successfully logged out";
	header('Location: index.php');
	die();
