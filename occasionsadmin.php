<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start();  
//checks session
if ($_SESSION['username'] == NULL) {
	//jumps back to login page
	header('Location: admin.php?status=2');
	die();
}
?>


<html>
<head>
	<title>Occasions</title>
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
	include "connectdatabase.php";
		//database script
	   $sql = "SELECT * FROM floweroccasion";
	   $dbrs = $dbConn->prepare($sql);
	   $dbrs->execute();
	   
	   $numrow = $dbrs->rowCount();
	   echo "<h1>Occasions - " . "(" . $numrow . ")</h1>";
	?>
	  <a class="menu" href="viewoccasion.php"><h3>View</h3></a>
	  <a class="menu"href="addrecord.php"><h3>Add Record</h3></a>
	  <a class="menu"href="deleterecord.php"><h3>Delete Record</h3></a>
</div>
</body>


</html>