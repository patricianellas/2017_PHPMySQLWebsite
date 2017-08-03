<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
//declare variables
$flowerid = $occasionID = "";
$floweridErr = $occasionErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks fields are not empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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



//if no errors proceed
if ($floweridErr == "1" && $occasionErr == "1") {
	include "connectdatabase.php";
	//database scripting = check if record exists
	$usernameCheckSQL = "SELECT * FROM floweroccasion WHERE FlowerID = ? AND OccasionID = ?;";
	$dbrs = $dbConn->prepare($usernameCheckSQL);
	$dbrs->execute([$flowerid, $occasionID]);
	$numrow = $dbrs->rowCount();
		// if record exists
		if ($numrow==1) {
			include "connectdatabase.php";
			//database scripting = delete record
			$sql = "DELETE FROM floweroccasion WHERE FlowerID = ? AND OccasionID = ?;";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$flowerid, $occasionID]);
			
			header('Location: deleterecord.php?status=1'); //jumps back to page
		} else {
			header('Location: deleterecord.php?status=2'); //jumps back to page
		}	
   
} else {
	header('Location: deleterecord.php?status=3'); //jumps back to page
}
?>