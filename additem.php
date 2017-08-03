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
	<title>Add Item</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
	<!--script preventing entering letters-->
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
	//checks status
	if (isset($_GET['status']) && $_GET['status'] == '1') {
		$errortitle = "Successfully added new item.";
		include "successalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '2') {
		$errortitle = "All fields required.";
		include "failedalert.php";
	} else if (isset($_GET['status']) && $_GET['status'] == '3') {
		$errortitle = "File error.";
		$errormsg = "Please check format of Price.";
		include "failedalert.php";
	} 
	?>
	
	<h2><a href="flowers.php">Back</a> - Add Item</h2>
	  <form action="additem_flower.php" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="admintitle">Image:</td>
			<td class="admintextbox"><input class="admintextbox" type="file" name="FileToUpload"></td>
		</tr>
		<tr>
			<td class="admintitle">Flower Name:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="flowername"></td>
		</tr>
		<tr>
			<td class="admintitle">Type:</td>
			<td class="admintextbox"><select class="admintextbox" name="typeID">
			  <option value="1">Roses</option>
			  <option value="2">Gerbera</option>
			  <option value="3">Lilies</option>
			  <option value="4">Orchids</option>
		    </select>
			</td>
		</tr>
		<tr>
			<td class="admintitle">Price:</td>
			<td class="admintextbox"><input class="admintextbox" type="text" name="price" onkeypress="return isNumberKey(event)"/></td>
		</tr>
		<tr>
			<td></td>
			<td class="admintextbox"><input class="adminbutton" type="submit" name="additem" value="Add Item"></td>
		</tr>
	  </table>
	  </form>

	</div>
</body>


</html>