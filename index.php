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
	echo "<hr><h6>" . $_SESSION['message'] . "</h6><hr>";
	unset($_SESSION['message']);
}
