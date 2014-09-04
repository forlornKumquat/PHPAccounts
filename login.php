<?php session_start(); ?>
<html>
<head>
</head>
<body>
<?php include 'header.html';?>

<form action="fetchUser.php" method="post">

<table>
<tr><td align="right">User Email</td><td><input type="text" name="uemail" required></td><td></td></tr>
<tr><td align="right">Password</td><td><input type="password" name="upassword" required></td>
<td>
<?php
	if(isset($_SESSION['message'])) echo "<font color=\"red\">" . $_SESSION['message'] . "</font>";
	unset($_SESSION['message']);
?>
</td></tr>
</table>
<input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>

