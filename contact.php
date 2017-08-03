<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php  session_start(); ?>
<html>
<head>
	<title>Contact</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="main" background="contact.jpg">
	

<!-- Top Navigation bar-->
<?php
include "topnavigationbar.php";

//checks status of page

if (isset($_GET['status']) && $_GET['status'] == '1') {
	$errortitle = "Success! ";
	$errormsg = "Enquiry successfully sent!";
	include "successalert.php";	
} else if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Error: ";
	$errormsg = "All fields are required.";
	include "failedalert.php";
} else if (isset($_GET['status']) && $_GET['status'] == '3') {
	$errortitle = "Error: ";
	$errormsg = "Invalid email format.";
	include "failedalert.php";
}

?>


	<div class="contact">

	<form action="contactpost.php" method="post" enctype="multipart/form-data">
	<p class="contactform">
	Name:<br>
	<input class="textbox" type="text" name="name" value="<?php if (isset($_SESSION['namesession'])) { echo $_SESSION['namesession'];} ?>"></p>
	<p class="contactform">
	Email Address:<br>
	<input class="textbox" type="text" name="email" value="<?php if (isset($_SESSION['emailsession'])) { echo $_SESSION['emailsession'];} ?>"></p>
	<p class="contactform">
	Message:<br>
	<textarea rows="5" cols="50" name="message" width="200px"><?php if (isset($_SESSION['messagesession'])) { echo $_SESSION['messagesession'];} ?></textarea></p>
	<center><input class="submit" type="submit" name="submit" value="Send"></center>
	</p>

	</div>
</body>

<footer>
</footer>
</html>

<?php unset($_SESSION['namesession']); 
unset($_SESSION['emailsession']);
unset($_SESSION['messagesession']);?>