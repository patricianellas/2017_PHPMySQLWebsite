<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start(); 
//checks session(); 
if ($_SESSION['username'] == NULL) {
	//jumps back to admin login page
	header('Location: admin.php?status=2');
	die();
}
?>


<html>
<head>
	<title>Enquiries</title>
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
	include "connectdatabase.php";
		//databse scripting = SELECT RECORDS
	   $sql = "SELECT * FROM enquiry";
	   $dbrs = $dbConn->prepare($sql);
	   $dbrs->execute();
	   
	   $numrow = $dbrs->rowCount();
	   echo "<h1>Enquiries - " . "(" . $numrow . ")</h1>";
	?>
	  <a class="menu" href="viewenquiry.php"><h3>View Enquiries</h3></a>
	  <a class="menu"href="deleteenquiry.php"><h3>Delete Enquiry</h3></a>
	</div>
</body>


</html>