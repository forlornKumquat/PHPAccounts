<?php
session_start();

include 'header.html';
if(!isset($_SESSION['user'])){
	echo "WELCOME! Guest";
}
else{
	echo "WELCOME! " . $_SESSION['user'] . "";
}

if(isset($_SESSION['message'])){
	echo "<hr>" . $_SESSION['message'] . "<hr>";
	unset($_SESSION['message']);
}
