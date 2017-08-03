<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start();  
//checks session
if ($_SESSION['username'] == NULL) {
	//jumps back to admin login page
	header('Location: admin.php?status=2');
	die();
}
?>


<html>
<head>
	<title>Delete Account</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="main">
	<div class="top">
		<p class="title">Rosetta Gardens - Administrator Page</p>
	</div>
	
	<ul>
		  <li><a href="adminhome.php">Home</a></li>
		  <li><a class="active" href="accounts.php">Accounts</a></li>
		  <li><a href="flowers.php">Flowers</a></li>
		  <li><a href="occasionsadmin.php">Occasions</a></li>
		  <li><a href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	<?php
	if (isset($_GET['status']) && $_GET['status'] == '1') {
	$errortitle = "Account successfully deleted.";
	include "successalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Error: ";
	$errormsg = "Account not deleted. Please check if the username exists.";
	include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
	$errortitle = "Input required.";
	include "failedalert.php";
	} 
	
	?>
	  <h2><a href="accounts.php">Back</a> - Delete Account</h2>
	  <form action="deleteaccount_mid.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Account Username:</h3>
	  <input type="text" name="username">
	  <input type="submit" name="submit" value="Delete">
	  </form>
	  
	</div>
</body>


</html>