<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->

<?php
session_start();

//declares variables
$flowerid = $flowername = $typeID = $price = "";
$floweridErr = $flowernameErr = $typeIDErr = $priceErr = $imageErr = $formatErr = $typenumErr = "";

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks if input is not EMPTY or NULL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["flowerid"])) {
    $flowerid = test_input($_POST["flowerid"]);
	$floweridErr = "1";
	} else {
	$floweridErr = "0";
	}
	
	if (!empty($_POST["flowername"])) {
    $flowername = test_input($_POST["flowername"]);
	$flowernameErr = "1";
	}
	  else {
	  $flowernameErr = "0";
	}
	if (!empty($_POST["typeid"])) {
    $typeID = test_input($_POST["typeid"]);
	$typeIDErr = "1";
	} else {
	  $typeIDErr = "0";
	}	
	
	if (!empty($_POST["price"])) {
    $price = test_input($_POST["price"]);
	$priceErr = "1";
	}
	  else {
	  $priceErr = "0";
	}
	
	if(!isset($_FILES["EditImageUpload"]) || $_FILES["EditImageUpload"]['error'] == UPLOAD_ERR_NO_FILE) {
	  $imageErr = "0";
	} else {
	  $imageErr = "1";
	}
	
}


//check errors on input
if ($floweridErr == "1" && $flowernameErr == "1" && $typeIDErr == "1" && $priceErr == "1") {
	if ($imageErr == "0") {
		//no image
		include "connectdatabase.php";
			   
		$sql = "UPDATE flower SET FlowerID = ?, FlowerName = ?, TypeID = ?, Price = ? WHERE FlowerID = ?;";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute([$flowerid, $flowername, $typeID, $price, $_SESSION['floweridsessioninput']]);
		
		header('Location: edititem.php?status=1');
	} else {
		//image included
		$flowerphoto = file_get_contents($_FILES["EditImageUpload"]["tmp_name"]);
		
		include "connectdatabase.php";
				   
		$sql = "UPDATE flower SET FlowerID = ?, FlowerPic = ?, FlowerName = ?, TypeID = ?, Price = ? WHERE FlowerID = ?;";
		$dbrs = $dbConn->prepare($sql);
		$dbrs->execute([$flowerid, $flowerphoto, $flowername, $typeID, $price, $_SESSION['floweridsessioninput']]);

		header('Location: edititem.php?status=1');
	}
	
} else {
	header('Location: edititem.php?status=7');
}
	


?>