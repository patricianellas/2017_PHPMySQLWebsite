<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php

session_start();
//declares variable
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = $emailFormatError = "";

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//checks if fields are empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["name"])) {
    $name = test_input($_POST["name"]);
	$nameErr = "1";
  }
  else {
	$nameErr = "0";
  }
  
  if (!empty($_POST["email"])) {
    $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailFormatError = "ERROR"; 
	}
	$emailErr = "1";
  }
  else {
	$emailErr = "0";
  }

  if (!empty($_POST["message"])) {
    $message = test_input($_POST["message"]);
	$messageErr = "1";
  }
  else {
	$messageErr = "0";
  }
  
}
//input validation - no errors
if ($nameErr == "1" && $emailErr == "1" && $messageErr == "1") {
	if ($emailFormatError == "ERROR") {
		$_SESSION['namesession'] = $name;
		$_SESSION['emailsession'] = $email;
		$_SESSION['messagesession'] = $message;
		header('Location: contact.php?status=3'); //jumps back to page
	} else {
		//database scripting
		include "connectdatabase.php";
			//insert data into database
		   $sql = "INSERT INTO enquiry (EnquiryID, EnquirerName, EnquirerEmail, Message, EnquiryDate) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP);";
		   $dbrs = $dbConn->prepare($sql);
		   $dbrs->execute([$name, $email, $message]);
			//sets session
			$_SESSION['namesession'] = $name;
			$_SESSION['emailsession'] = $email;
			$_SESSION['messagesession'] = $message;
			header('Location: contact.php?status=1');
	}
	
} else {
	//sets session
	$_SESSION['namesession'] = $name;
    $_SESSION['emailsession'] = $email;
    $_SESSION['messagesession'] = $message;
    header('Location: contact.php?status=2'); //jumps back to page
}
   
?>