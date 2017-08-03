<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->

<?php
//declares variables
$flowername = $typeID = $price = "";
$flowernameErr = $typeIDErr = $priceErr = $imageErr = $formatErr = "";

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//checks if input is not EMPTY or NULL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["flowername"])) {
    $flowername = test_input($_POST["flowername"]);
	$flowernameErr = "1";
	}
	  else {
	  $flowernameErr = "0";
	}
	if (!empty($_POST["typeID"])) {
    $typeID = test_input($_POST["typeID"]);
	$typeIDErr = "1";
	} else {
	  $typeIDErr = "0";
	}	
	if (!empty($_POST["price"])) {
    $price = test_input($_POST["price"]);
	if (!filter_var($price, FILTER_VALIDATE_INT)) {
		$formatErr = "ERROR";
	}
	$priceErr = "1";
	}
	  else {
	  $priceErr = "0";
	}
	
	if(!isset($_FILES["FileToUpload"]) || $_FILES["FileToUpload"]['error'] == UPLOAD_ERR_NO_FILE) {
	  $imageErr = "0";
	} else {
	  $imageErr = "1";
	}
}

//input validation = no errors
if ($flowernameErr == "1" && $typeIDErr == "1" && $priceErr == "1" && $imageErr == "1") {
	if ($formatErr == "ERROR") {
		header('Location: additem.php?status=3');
	}
	
	$flower_photo = file_get_contents($_FILES["FileToUpload"]["tmp_name"]);
		
	include "connectdatabase.php";
			   
	$sql = "INSERT INTO flower VALUES (DEFAULT, ?, ?, ?, ?);";
	$dbrs = $dbConn->prepare($sql);
	$dbrs->execute([$flower_photo, $flowername, $typeID, $price]);

	header('Location: additem.php?status=1');
	
} else {
	header('Location: additem.php?status=2');
}
	
				
	
			
   
?>