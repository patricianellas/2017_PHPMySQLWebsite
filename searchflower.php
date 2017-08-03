<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start();  
if ($_SESSION['username'] == NULL) {
	header('Location: admin.php?status=2');
	die();
}
?>


<html>
<head>
	<title>Search</title>
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
	//checks page status
	if (isset($_GET['status']) && $_GET['status'] == '2') {
	$errortitle = "Error: ";
	$errormsg = "Invalid input.";
	include "failedalert.php";
	} 
	
	?>
	
	
	  <h2><a href="flowers.php">Back</a> - Search</h2>
	  <form action="searchflowerID.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Flower ID:</h3>
	  <input type="text" name="flowerID" >
	  <input type="submit" name="submit" value="Search">
	  </form>
	  <form action="searchflowerbytype.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Type:</h3>
	  <select name="type">
		  <option value="roses">Roses</option>
		  <option value="gerbera">Gerbera</option>
		  <option value="lilies">Lilies</option>
		  <option value="orchids">Orchids</option>
	  </select>
	  <input type="submit" name="submit" value="Search">
	  </form>
	  <form action="searchflowerbyoccasion.php" method="post" enctype="multipart/form-data">
	  <h3>Enter Occasion:</h3>
	  <select name="occasion" width=>
		  <option value="congratulations">Congratulations</option>
		  <option value="sympathy">Sympathy</option>
		  <option value="getwell">Get Well</option>
		  <option value="birthday">Birthday</option>
		  <option value="valentines">Valentine's Day</option>
		  <option value="weddings">Weddings</option>
		  <option value="anniversary">Anniversary</option>
		  <option value="thankyou">Thank You</option>
	  </select>
	  <input type="submit" name="submit" value="Search">
	  </form>

	</div>
	
</body>


</html>