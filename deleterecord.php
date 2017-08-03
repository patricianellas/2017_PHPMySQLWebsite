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
	<title>Delete Record</title>
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
		  <li><a href="accounts.php">Accounts</a></li>
		  <li><a href="flowers.php">Flowers</a></li>
		  <li><a class="active" href="occasionsadmin.php">Occasions</a></li>
		  <li><a href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	
	<?php
	//checks page status
	if (isset($_GET['status']) && $_GET['status'] == '1') {
	$errortitle = "Record successfully deleted.";
	include "successalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Error: ";
	$errormsg = "Record not deleted. Please check if the record exists.";
	include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
	$errortitle = "All fields required.";
	include "failedalert.php";
	} 
	?>
	
	<h2><a href="occasionsadmin.php">Back</a> - Delete Record</h2>
	  <form action="deleterecord_mid.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Flower ID:</h3>
	  <input type="text" name="flowerid">
	  <h3>Enter Occasion:</h3>
	  <select name="occasion" width=>
		  <option value="1">Congratulations</option>
		  <option value="2">Sympathy</option>
		  <option value="3">Get Well</option>
		  <option value="4">Birthday</option>
		  <option value="5">Valentine's Day</option>
		  <option value="6">Wedding</option>
		  <option value="7">Anniversary</option>
		  <option value="8">Thank You</option>
	  </select>
	  <Br><br>
	  <input type="submit" name="submit" value="Delete Record">
	  </form>

	</div>
</body>


</html>