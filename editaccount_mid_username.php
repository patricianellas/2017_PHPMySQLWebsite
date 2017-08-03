<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
session_start(); 
//declare variable
$username = "";
$usernameErr = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks if fields are null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["usernameeditinput"])) {
    $username = test_input($_POST["usernameeditinput"]);
	$usernameErr = "1";
  }
  else {
	$usernameErr = "0";
  }
}

//if no error then proceed
if ($usernameErr == "1") {
	include "connectdatabase.php";
		//database scripting = CHECK RECORD
		$usernameCheckSQL = "SELECT * FROM account WHERE Username = ?";
		$dbrs = $dbConn->prepare($usernameCheckSQL);
		$dbrs->execute([$username]);
		$numrow = $dbrs->rowCount();
		// if record exists
		if ($numrow==1) {
			$_SESSION['usernameinput'] = $username;
			foreach ($dbrs as $dbrow) {
				$_SESSION['eformusername'] = $dbrow['Username'];
				$_SESSION['epassword'] = $dbrow['Password'];
				$_SESSION['efname'] = $dbrow['FirstName'];
				$_SESSION['elname'] = $dbrow['LastName'];
				$_SESSION['eemail'] = $dbrow['UserEmail'];
				$_SESSION['ephone'] = $dbrow['UserPhone'];
				$_SESSION['eaddress'] = $dbrow['UserAddress'];
			}
			header('Location: editaccount.php'); // Jump to secured page
		} else {
			header('Location: editaccount.php?status=4'); //jumps back to page
		}
}
   
?>