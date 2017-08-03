<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<html>
<head>
	<title>
	Type
	</title>
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
   //get variable
   $type= $_GET['type'];
   //database scripting
   $sql = "SELECT * FROM `flower` INNER JOIN `flowertype`ON flower.TypeID = flowertype.TypeID WHERE flowertype.TypeName = ?";
   $dbrs = $dbConn->prepare($sql);
   $dbrs->execute(array($type));
   //data allocation
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