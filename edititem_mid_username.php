<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
session_start(); 
//declare variable
$flowerid = "";
$floweridErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks if fields are null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["floweridinput"])) {
    $flowerid = test_input($_POST["floweridinput"]);
	$floweridErr = "1";
  }
  else {
	$floweridErr = "0";
  }
}

//if no error then proceed
if ($floweridErr == "1") {
	include "connectdatabase.php";
		//database scripting = CHECK RECORD
		$usernameCheckSQL = "SELECT * FROM flower WHERE FlowerID = ?";
		$dbrs = $dbConn->prepare($usernameCheckSQL);
		$dbrs->execute([$flowerid]);
		$numrow = $dbrs->rowCount();
		// if record exists
		if ($numrow==1) {
			$_SESSION['floweridsessioninput'] = $flowerid;
			foreach ($dbrs as $dbrow) {
				$_SESSION['eflowerid'] = $dbrow['FlowerID'];
				$_SESSION['eflowerpic'] = $dbrow['FlowerPic'];
				$_SESSION['eflowername'] = $dbrow['FlowerName'];
				$_SESSION['etypeid'] = $dbrow['TypeID'];
				$_SESSION['eprice'] = $dbrow['Price'];
			}
			$_SESSION['etimeout'] = time(); // Taking now logged in time.
			header('Location: edititem.php'); // Jump to secured page
		} else {
			header('Location: edititem.php?status=2'); //jumps back to page
		}
} else {
	header('Location: edititem.php?status=6'); //jumps back to page
}
   
?>