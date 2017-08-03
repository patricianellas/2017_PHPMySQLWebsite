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
	<title>Edit Item</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
	<script>
		function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
			return false;
		return true;
		}
	</script>
</header>

<body class="main">
	<div class="top">
		<p class="title">Rosetta Gardens - Administrator Page</p>
	</div>
	
	<ul>
		  <li><a href="adminhome.php">Home</a></li>
		  <li><a href="accounts.php">Accounts</a></li>
		  <li><a class="active" href="flowers.php">Flowers</a></li>
		  <li><a href="occasionsadmin.php">Occasions</a></li>
		  <li><a href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	
	<?php
	//unsets session in form
	function unsetEditFlowerSession() {
			unset($_SESSION['floweridsessioninput']);
			unset($_SESSION['eflowerid']);
			unset($_SESSION['eflowername']);
			unset($_SESSION['etypeid']);
			unset($_SESSION['eprice']);
	}
	//checks page status
	if (isset($_GET['status']) && $_GET['status'] == '1') {
		$errortitle = "Account successfully edited.";
		include "successalert.php";
		unsetEditFlowerSession();
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
		$errortitle = "Input Error. ";
		$errormsg = "Flower ID does not exist.";
		include "failedalert.php";
		unsetEditFlowerSession();
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
		$errortitle = "Price format error.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '5') {
		$errortitle = "No record found.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '6') {
		$errortitle = "Input required.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '7') {
		$errortitle = "All fields required.";
		include "failedalert.php";
	} 
	
	?>
	
	
	  <h2><a onClick="unsetEditFlowerSession(); return false;" href="flowers.php">Back</a> - Edit Item</h2>
	  <form action="edititem_mid_username.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Flower ID:</h3>
	  <input type="text" name="floweridinput" value="<?php if (isset($_SESSION['floweridsessioninput'])) { echo $_SESSION['floweridsessioninput']; } ?>" onkeypress="return isNumberKey(event)"/>
	  <input type="submit" name="submit" value="Search">
	  </form>
	  
	  <form action="edititem_form.php" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="admintitle">Flower ID:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="flowerid" value="<?php if (isset($_SESSION['eflowerid'])) { echo $_SESSION['eflowerid']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Image:</td>
			<td class="admintextbox"><input class="admintextbox" type="file" name="EditImageUpload"></td>
		</tr>
		<tr>
			<td class="admintitle">Flower Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="flowername" value="<?php if (isset($_SESSION['eflowername'])) { echo $_SESSION['eflowername']; } ?>"></td>
		</tr>
		<tr>
			<td class="admintitle">Type ID:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="typeid" value="<?php if (isset($_SESSION['etypeid'])) { echo $_SESSION['etypeid']; } ?>" onkeypress="return isNumberKey(event)"/></td>
			<!-- type guide-->
			<td><p>1 - Roses 2 - Gerbera 3 - Lilies 4 - Orchids</p></td>
		</tr>
		<tr>
			<td class="admintitle">Price:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="price" value="<?php if (isset($_SESSION['eprice'])) { echo $_SESSION['eprice']; } ?>" onkeypress="return isNumberKey(event)"/></td>
		</tr>
		<tr>
			<td></td>
			<td class="admintextbox"><input class="adminbutton" type="submit" name="edititem" value="Edit Item"></td>
		</tr>
	  </table>
	  </form>

	</div>
</body>


</html>