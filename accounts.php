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
//unsets session = Deletes data in Edit Account form
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
	
unsetEditSession();
?>


<html>
<head>
	<title>Accounts</title>
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
	//connection to database
	include "connectdatabase.php";
	
	   // SQL SCRIPT
	   $sql = "SELECT * FROM account";
	   $dbrs = $dbConn->prepare($sql);
	   $dbrs->execute();
	   
	   $numrow = $dbrs->rowCount();
	   echo "<h1>Accounts - " . "(" . $numrow . ")</h1>";
	?>
	
	
	  <a class="menu" href="viewaccount.php"><h3>View All</h3></a>
	  <a class="menu"href="addaccount.php"><h3>Add Account</h3></a>
	  <a class="menu"href="editaccount.php"><h3>Edit Account</h3></a>
	  <a class="menu"href="deleteaccount.php"><h3>Delete Account</h3></a>
</div>
</body>


</html>