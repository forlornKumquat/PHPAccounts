<?php
//db connection.  Necessary variables imported depending on function
$db = new mysqli($host,$user,$password,$database);
if($db->connect_error){
	die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error . "\n");
}
