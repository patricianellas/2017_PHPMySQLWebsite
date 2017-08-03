<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php 
session_start(); 
//sets session time
if ($_SESSION['timeout'] + 1 * 0.1 < time()) {
	//unsets session
     unset($_SESSION['username_input']);
}
?>

<html>
<head>
	<title>Admin Login</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="main" background="admin.jpg">
	

<!-- Top Navigation bar-->
<?php
include "topnavigationbar.php";

if (isset($_GET['status']) && $_GET['status'] == '1') {
	$errortitle = "Username or Password is incorrect.";
	include "failedalert.php";
} 
if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Login required.";
	include "failedalert.php";
} 

?>

	<div class="contact">
	<center><img src="login.png" height="50" width="50">
	<p class="admin">ADMINISTRATOR LOGIN</p></center>
	<form action="adminlogin.php" method="post">
	<p class="contactform">
	USERNAME:
	<input class="textbox" type="text" name="username" value="<?php if (isset($_SESSION['username_input'])) { echo $_SESSION['username_input']; } ?>"></p>
	<p class="contactform">
	PASSWORD:
	<input class="textbox" type="password" name="password"></p>
	<p class="contactform">
	<center><input class="submit" type="submit" name="submit" value="Login"></center>
	</p>

	</div>
</body>

<footer>
</footer>
</html>
