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
	<title>Delete Enquiry</title>
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
		  <li><a href="occasionsadmin.php">Occasions</a></li>
		  <li><a class="active" href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	<?php
	//checks page status
	if (isset($_GET['status']) && $_GET['status'] == '1') {
	$errortitle = "Enquiry successfully deleted.";
	include "successalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Error: ";
	$errormsg = "Enquiry not deleted. Please check if the Enquiry ID exists.";
	include "failedalert.php";
	} 
	?>
	
	<h2><a href="enquiries.php">Back</a> - Delete Enquiry</h2>
	  <form action="deleteenquiry_mid.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Enquiry ID:</h3>
	  <input type="text" name="enquiryid" >
	  <input type="submit" name="submit" value="Delete Enquiry">
	  </form>
	</div>
</body>


</html>