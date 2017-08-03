<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php

session_start(); 
//declare variables
$password = $firstname = $lastname = $emailaddress = $phone = $address = "";
$passwordErr = $firstnameErr = $lastnameErr = $emailaddressErr = $phoneErr = $addressErr = $emailFormatError = $phoneFormatError = "";

//prevents sql injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//ensures fields are not empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["password"])) {
    $password = test_input($_POST["password"]);
	$passwordErr = "1";
  }
  else {
	$passwordErr = "0";
  }
  
  if (!empty($_POST["firstname"])) {
    $firstname = test_input($_POST["firstname"]);
	$firstnameErr = "1";
  }
  else {
	$firstnameErr = "0";
  }
  
  if (!empty($_POST["lastname"])) {
    $lastname = test_input($_POST["lastname"]);
	$lastnameErr = "1";
  }
  else {
	$lastnameErr = "0";
  }
  
  if (!empty($_POST["emailaddress"])) {
    $emailaddress = test_input($_POST["emailaddress"]);
	if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
		$emailFormatError = "ERROR"; 
	}
	$emailaddressErr = "1";
  }
  else {
	$emailaddressErr = "0";
  }

  if (!empty($_POST["phone"])) {
    $phone = test_input($_POST["phone"]);
	if (!filter_var($phone, FILTER_VALIDATE_INT)) {
		$phoneFormatError = "ERROR";
	}
	$phoneErr = "1";
  }
  else {
	$phoneErr = "0";
  }
  
  if (!empty($_POST["address"])) {
    $address = test_input($_POST["address"]);
	$addressErr = "1";
  }
  else {
	$addressErr = "0";
  }
}

//if no error then proceed
if ($passwordErr == "1" && $firstnameErr == "1" && $lastnameErr == "1" && $emailaddressErr == "1" && $phoneErr == "1" && $addressErr == "1") {
	if ($emailFormatError == "ERROR" || $phoneFormatError == "ERROR") {
		header('Location: editaccount.php?status=3'); //jumps back to page
	} else {
		include "connectdatabase.php";
		//database scripting = CHECKING RECORD
		$usernameCheckSQL = "SELECT * FROM account WHERE Username = ?";
		$dbrs = $dbConn->prepare($usernameCheckSQL);
		$dbrs->execute([$_SESSION['usernameinput']]);
		$numrow = $dbrs->rowCount();
		//if record exists
		if ($numrow==1) {
			include "connectdatabase.php";
			//database scripting = UPDATE RECORD
			$sql = "UPDATE account SET Password = ?, FirstName = ?, LastName = ?, UserEmail = ?, UserPhone = ?, UserAddress = ? WHERE Username = ?;";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$password, $firstname, $lastname, $emailaddress, $phone, $address, $_SESSION['usernameinput']]);
			//sets sessions
			$_SESSION['epassword'] = $password;
			$_SESSION['efname'] = $firstname;
			$_SESSION['elname'] = $lastname;
			$_SESSION['eemail'] = $emailaddress;
			$_SESSION['ephone'] = $phone;
			$_SESSION['eaddress'] = $address;
			$_SESSION['etimeout'] = time(); // Taking now logged in time.
			
			header('Location: editaccount.php?status=1'); //jumps back to page
		} else {
			header ('Location: editaccount.php?status=5'); //jumps back to page
		}	
	}	
} else {
   header('Location: editaccount.php?status=2'); //jumps back to page
}
   
?>