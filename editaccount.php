<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start();  
//check session
if ($_SESSION['username'] == NULL) {
	//jumps back to admin login page
	header('Location: admin.php?status=2');
	die();
}


?>


<html>
<head>
	<title>Edit Account</title>
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
	//unsets session in form
	function unsetEditSession() {
	if ($_SESSION['etimeout'] + 1 * 0.1 < time()) {
			unset($_SESSION['usernameinput']);
			unset($_SESSION['epassword']);
			unset($_SESSION['efname']);
			unset($_SESSION['elname']);
			unset($_SESSION['eemail']);
			unset($_SESSION['ephone']);
			unset($_SESSION['eaddress']);
		}
	}
	//checks page status
	if (isset($_GET['status']) && $_GET['status'] == '1') {
		$errortitle = "Account successfully edited.";
		include "successalert.php";
		include "unsetEditSession.php";	
		unsetEditSession();
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
		$errortitle = "All fields required.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
		$errortitle = "Format Error. ";
		$errormsg = "Check your email address or phone number.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '4') {
		$errortitle = "Username does not exist. Please try again.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '5') {
		$errortitle = "Unidentified error.";
		$errormsg = "Please retry.";
		include "failedalert.php";
	}
	?>
	  <h2><a href="accounts.php">Back</a> - Edit Account</h2>
	  <form action="editaccount_mid_username.php" method="post" enctype="multipart/form-data">
	  <p><b>Enter Account Username:</b></p>
	  <input type="text" name="usernameeditinput" value="<?php if (isset($_SESSION['usernameinput'])) { echo $_SESSION['usernameinput']; } ?>">
	  <input type="submit" name="submit" value="Search">
	  </form>
	  
	  <form action="editaccount_form.php" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="admintitle">Password:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="password" value="<?php if (isset($_SESSION['epassword'])) { echo $_SESSION['epassword']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">First Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="firstname" value="<?php if (isset($_SESSION['efname'])) { echo $_SESSION['efname']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Last Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="lastname" value="<?php if (isset($_SESSION['elname'])) { echo $_SESSION['elname']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Email Address:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="emailaddress" value="<?php if (isset($_SESSION['eemail'])) { echo $_SESSION['eemail']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Phone:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="phone" value="<?php if (isset($_SESSION['ephone'])) { echo $_SESSION['ephone']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Address:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="address" value="<?php if (isset($_SESSION['eaddress'])) { echo $_SESSION['eaddress']; } ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="admintextbox"><input class="adminbutton" type="submit" name="editaccount" value="Edit Account"></td>
		</tr>
	  </table>
	  </form>
	</div>
</body>


</html>
