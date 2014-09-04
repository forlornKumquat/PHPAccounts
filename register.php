<?php session_start(); ?>
<html>
<head>
</head>
<body>
<?php include 'header.html'; ?>
<form action="insertUser.php" method="post">

<?php
	if(isset($_SESSION['message'])) echo "<font color=\"red\">" . $_SESSION['message'] . "</font>";
	unset($_SESSION['message']);
?>
<table>
<tr><td align="right">User Email</td><td><input type="text" name="uemail" required></td></tr>
<tr><td align="right">Username</td><td><input type="text" name="uname" required></td></tr>
<tr><td align="right">Password</td><td><input type="password" name="upassword" required></td></tr>
<tr><td align="right">Confirm Password</td><td><input type="password" name="upassword2" required</td></tr> 
</table>
<input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>

