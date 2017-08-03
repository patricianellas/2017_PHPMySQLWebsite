<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->

<?php
//declares variables
$username = $password = $firstname = $lastname = $emailaddress = $phone = $address = "";
$usernameErr = $passwordErr = $firstnameErr = $lastnameErr = $emailaddressErr = $phoneErr = $addressErr = $emailFormatError = $phoneFormatError = "";

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//checks if input is not EMPTY or NULL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["username"])) {
    $username = test_input($_POST["username"]);
	$usernameErr = "1";
  }
  else {
	$usernameErr = "0";
  }
  
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

//input validation = no errors
if ($usernameErr == "1" && $passwordErr == "1" && $firstnameErr == "1" && $lastnameErr == "1" && $emailaddressErr == "1" && $phoneErr == "1" && $addressErr == "1") {
	if ($emailFormatError == "ERROR" || $phoneFormatError == "ERROR") {
		header('Location: addaccount.php?status=3');
	} else {
		include "connectdatabase.php";
		
		$usernameCheckSQL = "SELECT * FROM account WHERE Username = ?";
		$dbrs = $dbConn->prepare($usernameCheckSQL);
		$dbrs->execute([$username]);
		$numrow = $dbrs->rowCount();
		//if record is found
		if ($numrow==1) {
			//jumps back to page with error
			header ('Location: addaccount.php?status=4');
		} else {
			//enters the data into database
			include "connectdatabase.php";
			$sql = "INSERT INTO account (Username, Password, FirstName, LastName, UserEmail, UserPhone, UserAddress) VALUES (?, ?, ?, ?, ?, ?, ?);";
			$dbrs = $dbConn->prepare($sql);
			$dbrs->execute([$username, $password, $firstname, $lastname, $emailaddress, $phone, $address]);
	   
			//jumps back to page
			header('Location: addaccount.php?status=1');
		}	
	}	
} else {
			//input required error
		   header('Location: addaccount.php?status=2');
}
   
?>