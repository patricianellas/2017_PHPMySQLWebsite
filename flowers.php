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
	
	
	//unsets session in form
	function unsetEditFlowerSession() {
			unset($_SESSION['floweridsessioninput']);
			unset($_SESSION['eflowerid']);
			unset($_SESSION['eflowername']);
			unset($_SESSION['etypeid']);
			unset($_SESSION['eprice']);
	}
	
	unsetEditFlowerSession();

}
?>


<html>
<head>
	<title>Flowers</title>
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
		  <li><a class="active" href="flowers.php">Flowers</a></li>
		  <li><a href="occasionsadmin.php">Occasions</a></li>
		  <li><a href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	<?php
	include "connectdatabase.php";
		//database scripts
	   $sql = "SELECT * FROM flower";
	   $dbrs = $dbConn->prepare($sql);
	   $dbrs->execute();
	   
	   $numrow = $dbrs->rowCount();
	   echo "<h1>Flowers - " . "(" . $numrow . ")</h1>";
	?>
	  <a class="menu" href="searchflower.php"><h3>Search</h3></a>
	  <a class="menu"href="additem.php"><h3>Add Item</h3></a>
	  <a class="menu"href="edititem.php"><h3>Edit Item</h3></a>
	  <a class="menu"href="deleteitem.php"><h3>Delete Item</h3></a>
</div>
</body>


</html>