<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
//declares variables
$enquiryid = "";
$enquiryidErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks fields are not null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["enquiryid"])) {
    $enquiryid = test_input($_POST["enquiryid"]);
	$enquiryidErr = "1";
  } else {
	$enquiryidErr = "0";
  }
}



//ensures there are no errors
if ($enquiryidErr == "1") {
	include "connectdatabase.php";
	//database scripting = checking record
	$usernameCheckSQL = "SELECT * FROM enquiry WHERE EnquiryID = ?";
	$dbrs = $dbConn->prepare($usernameCheckSQL);
	$dbrs->execute([$enquiryid]);
	$numrow = $dbrs->rowCount();
		//if record exists
		if ($numrow==1) {
			include "connectdatabase.php";
			//database scripting  = delete record
			$sql = "DELETE FROM enquiry WHERE EnquiryID = ?;";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$enquiryid]);
			//jumps back to page
			header('Location: deleteenquiry.php?status=1');
		} else {
			//jumps back to page
			header('Location: deleteenquiry.php?status=2');
		}	
   
}
?>