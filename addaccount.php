<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->

<?php   session_start();  
//checks session
if ($_SESSION['username'] == NULL) {
	//jumps to admin login page
	header('Location: admin.php?status=2');
	die();
}
?>

<html>
<head>
	<title>Add Account</title>
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
	//checks status for error message
	if (isset($_GET['status']) && $_GET['status'] == '1') {
		$errortitle = "New account successfully created.";
		include "successalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
		$errortitle = "All fields required.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
		$errortitle = "Format Error. ";
		$errormsg = "Check your email address or phone number.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '4') {
		$errortitle = "Account username already exists.";
		include "failedalert.php";
	}
	?>
	<!-- Form input -->
	<h2><a href="accounts.php">Back</a> - Add Account</h2>
	  <form action="addaccount_mid.php" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="admintitle">Username:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="username"></td>
		</tr>
		<tr>
			<td class="admintitle">Password:</td>
			<td class="admintextbox"><input class="admintextbox" type="password" name="password"></td>
		</tr>
		<tr>
			<td class="admintitle">First Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="firstname"></td>
		</tr>
		<tr>
			<td class="admintitle">Last Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="lastname"></td>
		</tr>
		<tr>
			<td class="admintitle">Email Address:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="emailaddress"></td>
		</tr>
		<tr>
			<td class="admintitle">Phone:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="phone"></td>
		</tr>
		<tr>
			<td class="admintitle">Address:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="address"></td>
		</tr>
		<tr>
			<td></td>
			<td class="admintextbox"><input class="adminbutton" type="submit" name="addaccount" value="Add Account"></td>
		</tr>
	  </table>
	  </form>
	
	
	</div>
	

   
</body>


</html>