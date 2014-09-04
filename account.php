<?php
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	die();
}
?>
<head>
<script>
//havent decided how to handle these inputs and update the mysql query
	function submitFirstname(){
//		var uFirst = document.getElementById("ufirstname").value;
//		alert(uFirst);
	}
	function submitLastname(){
//		var uLast = document.getElementById("ulastname").value;
//		alert(uLast);
	}
	function submitBirthdate(){
//		var DOB = document.getElementById("ubirthdate").value;
//		if(DOB.search(/[0-9]{4}-[0-9]{2}-[0-9]{2}$/i) == 0){
//			alert(DOB);
//		}
//		else {alert("wrong!");}
	}
</script>
</head>
<body>
<?php
include 'header.html';

if(isset($_SESSION['message'])){
	echo "<hr><h6>" . $_SESSION['message'] . "</h6><hr>";
	unset($_SESSION['message']);
}
	include 'includes/dbVar.php';
	include 'includes/dbCon.php';

	$myEmail = $db->real_escape_string($_SESSION['user']);
	$aQuery = "SELECT * FROM userData WHERE uEmail = '" . $myEmail . "'";

	if($result = $db->query($aQuery)){
		$row = $result->fetch_assoc();
		$result->free();

		echo "<hr>You are logged in as " . $row['uEmail'] . "<hr>";
		echo "<div>";
		echo "<table>";
	//		echo "<tr><td align=\"right\">Email:</td><td>" . $row['uEmail'] . "</td></td><td></td></tr>";
			echo "<tr><td align=\"right\">First name:</td><td>" . $row['uFirstName'] . "</td><td><input type=\"text\" name=\"ufirstname\"></td></tr>";
			echo "<tr><td align=\"right\">Last name:</td><td>" . $row['uLastName'] . "</td><td><input type=\"text\" name=\"ulastname\"></td></tr>";
			echo "<tr><td align=\"right\">DOB:</td><td>" . $row['uBirthDate'] . "</td><td><input type=\"text\" placeholder=\"YYYY-MM-DD\"  name=\"ubirthdate\"></td></tr>";
			echo "<tr><td></td><td></td><td><input type=\"submit\" name=\"submit\" value=\"Submit\"/></td></tr>";
		echo "</table>";
		echo "</div>";
	}
	else {echo "Problems accessing account";}
?>
</body>
