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
	  <h2><a href='searchflower.php'>Back</a> - Search</h2>
		<center><table class="maintable">
		<tr>
		<td><b>Flower ID</b></td>
		<td><b>Flower Picture</b></td>
		<td><b>Flower Name</b></td>
		<td><b>TypeID</b></td>
		<td><b>Occasion</b></td>
		<td><b>Price</b></td>
		</tr>
		
	<?php
//declares variables
$occasion = "";
$occasionErr = "";
//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//ensure fields are not null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["occasion"])) {
    $occasion = test_input($_POST["occasion"]);
	if ($occasion == "getwell") {
		$occasion = "Get well";
	} else if ($occasion == "valentines") {
		$occasion = "Valentine's Day";
	} else if ($occasion == "thankyou") {
		$occasion = "Thank You";
	}
	$occasionErr = "1";
  }
  else {
	$occasionErr = "0";
  }
}

//ensures there are no errors before proceeding
if ($occasionErr == "1") {
	include "connectdatabase.php";
	//database scripting = SELECT
	$sql = "SELECT * FROM flower INNER JOIN floweroccasion 
	ON flower.flowerID = floweroccasion.flowerID INNER JOIN occasion ON floweroccasion.occasionID = 
	occasion.occasionID WHERE occasion.OccasionName = ?";
	$dbrs = $dbConn->prepare($sql);
	$dbrs->execute([$occasion]);

	//data allocation
	foreach ($dbrs as $dbrow) {
		echo "<tr>\n";
		echo "<td>" . $dbrow['FlowerID'] . "</td>";
		echo "<td class='image'><center><img src='data:image/jpeg;base64," . base64_encode( $dbrow['FlowerPic']) . "' height=70 width=70/></td>";
		echo "<td>" . $dbrow['FlowerName'] . "</td>";
		echo "<td>" . $dbrow['TypeID'] . "</td>";
		echo "<td>" . $dbrow['OccasionName'] . "</td>";
		echo "<td>" . $dbrow['Price'] . "</td>";
		echo "</tr>\n";

   }
	} else {
	header('Location: searchflower.php?status=2'); //jumps back to page
	}	
?>
	  
	  
	</div>
	
</body>


</html>