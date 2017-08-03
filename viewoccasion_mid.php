<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<html>
<head>
	<title>Search</title>
<style>
  table {
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid black;
	background: white;
    padding: 10px;
    text-align: left;
  }
  body {
  overflow-y: auto
}
</style>
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
	  <h2><a href='viewoccasion.php'>Back</a> - Search</h2>
		<center><table class="maintable">
		<tr>
		<td><b>Flower ID</b></td>
		<td><b>Flower Name</b></td>
		<td><b>Occasion ID</b></td>
		<td><b>Occasion Name</b></td>
		</tr>
		
	<?php
//declares variable
$occasion = "";
$occasionErr = "";
//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//ensures fields are not empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["occasion"])) {
    $occasion = test_input($_POST["occasion"]);
	$occasionErr = "1";
  }
  else {
	$occasionErr = "0";
  }
}

//ensures there are no errors before proceeding
if ($occasionErr == "1") {
	include "connectdatabase.php";

	$sql = "SELECT * FROM floweroccasion INNER JOIN flower ON floweroccasion.FlowerID = flower.FlowerID 
	INNER JOIN occasion ON floweroccasion.OccasionID = occasion.OccasionID WHERE floweroccasion.OccasionID = ?";
	$dbrs = $dbConn->prepare($sql);
	$dbrs->execute([$occasion]);


	foreach ($dbrs as $dbrow) {
		echo "<tr>\n";
		echo "<td>" . $dbrow['FlowerID'] . "</td>";
		echo "<td>" . $dbrow['FlowerName'] . "</td>";
		echo "<td>" . $dbrow['OccasionID'] . "</td>";
		echo "<td>" . $dbrow['OccasionName'] . "</td>";
		echo "</tr>\n";

   }
	} else {
	header('Location: viewoccasion.php?status=2'); //jumps back to page
	}	
?>
	  
	  
	</div>
	
</body>


</html>