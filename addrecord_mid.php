<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
//declare variables
$flowerid = $occasionID = "";
$floweridErr = $occasionErr = "";

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//checks that fields are not empty
	if (!empty($_POST["flowerid"])) {
    $flowerid = test_input($_POST["flowerid"]);
	$floweridErr = "1";
  }
  else {
	$floweridErr = "0";
  }
  
  if (!empty($_POST["occasion"])) {
    $occasionID = test_input($_POST["occasion"]);
	$occasionErr = "1";
  }
  else {
	$occasionErr = "0";
  }
}



//input validation
if ($floweridErr == "1" && $occasionErr == "1") {
	//connect to database
	include "connectdatabase.php";
	//DATABASE SCRIPTING - Search for record
	$usernameCheckSQL = "SELECT * FROM floweroccasion WHERE FlowerID = ? AND OccasionID = ?;";
	$dbrs = $dbConn->prepare($usernameCheckSQL);
	$dbrs->execute([$flowerid, $occasionID]);
	$numrow = $dbrs->rowCount();
		//if record found
		if ($numrow==1) {
			//jumps back to page
			header('Location: addrecord.php?status=1');
		} else {

			//DATABASE SCRIPTING - Inserting Data
			include "connectdatabase.php";

			$sql = "INSERT INTO floweroccasion VALUES (?,?);";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$flowerid, $occasionID]);
			
			//jumps back to page
			header('Location: addrecord.php?status=2');
		}	
   
}
else {
	//jumps back to page
	header('Location: addrecord.php?status=3');
}
?>