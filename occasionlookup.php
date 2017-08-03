<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<html>
<head>
	<title>Occasion</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="lookup" background="occasion.jpg">
	

<!-- Top Navigation bar-->
<?php
include "topnavigationbar.php";
?>
	
	<div >
		
		<center>
		<?php
		   include "connectdatabase.php";
		   //GET variable
		   $Occasion= $_GET['occasion'];
		   //database script - SELECT
		   $sql = "SELECT * FROM `flower` INNER JOIN `floweroccasion` ON flower.FlowerID = floweroccasion.FlowerID 
		   INNER JOIN `occasion` ON floweroccasion.OccasionID = occasion.OccasionID WHERE occasion.OccasionName = ?";
		   $dbrs = $dbConn->prepare($sql);
		   $dbrs->execute(array($Occasion));
		   
		   //data allocation from database
		   foreach ($dbrs as $dbrow) {
			    echo "<table class='inblock'>";
				echo "<tr>\n";
				echo "<td class='image'><center><img src='data:image/jpeg;base64," . base64_encode( $dbrow['FlowerPic']) . "' height=150 width=150/></td>";
				echo "</tr>\n"; 
				echo "<tr>\n";
				echo "<td class='querydesc'>" . $dbrow['FlowerName'] . "</td>";
				echo "</tr>\n"; 
				echo "<tr>\n";
				echo "<td class='querydesc'>" . "$" . $dbrow['Price'] . "</td>";
				echo "</tr>\n"; 
				echo "</table>";
		   }
		   
		?>	
		</center>
	</div>
</body>

<footer>
</footer>
</html>