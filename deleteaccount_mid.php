<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
//declares variables
$username = "";
$usernameErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks if fields are empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["username"])) {
    $username = test_input($_POST["username"]);
	$usernameErr = "1";
  }
  else {
	$usernameErr = "0";
  }
}

//checks that there are no errors
if ($usernameErr == "1") {
	include "connectdatabase.php";
		
	$usernameCheckSQL = "SELECT * FROM account WHERE Username = ?";
	$dbrs = $dbConn->prepare($usernameCheckSQL);
	$dbrs->execute([$username]);
	$numrow = $dbrs->rowCount();
		
		if ($numrow==1) {
			include "connectdatabase.php";
			//DATABASE - Delete record
			$sql = "DELETE FROM account WHERE Username = ?;";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$username]);
			//jumps back to page
			header('Location: deleteaccount.php?status=1');
		} else {
			//jumps back to page
			header('Location: deleteaccount.php?status=2');
		}	
   
} else {
	//jumps back to page
	header('Location: deleteaccount.php?status=3');
}
?>