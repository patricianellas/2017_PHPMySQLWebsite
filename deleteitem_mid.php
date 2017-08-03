<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
//declare variables
$flowerid = "";
$floweridErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks fields are not null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["flowerid"])) {
    $flowerid = test_input($_POST["flowerid"]);
	$floweridErr = "1";
  }
  else {
	$floweridErr = "0";
  }
}



//if no errors proceed
if ($floweridErr == "1") {
	include "connectdatabase.php";
		
	$usernameCheckSQL = "SELECT * FROM flower WHERE FlowerID = ?;";
	$dbrs = $dbConn->prepare($usernameCheckSQL);
	$dbrs->execute([$flowerid]);
	$numrow = $dbrs->rowCount();
		//if record exists
		if ($numrow==1) {
			include "connectdatabase.php";

			//database scripting = delete record
			$sql = "DELETE FROM flower WHERE FlowerID = ?;";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$flowerid]);
			
			
			header('Location: deleteitem.php?status=1'); //jumps back to page
		} else {
			header('Location: deleteitem.php?status=2'); //jumps back to page
		}	 
   
} else {
	header('Location: deleteitem.php?status=3'); //jumps back to page
}
?>