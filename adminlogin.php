<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php
session_start();

//prevents SQL injection
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
//sets variables
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);	

//Database scripting - SEARCH
include "connectdatabase.php";

$sql = "SELECT * FROM account WHERE Username = ? AND Password = ?;";
		   $dbrs = $dbConn->prepare($sql);
		   $dbrs->execute([$username, $password]);
	       $numrow = $dbrs->rowCount();
	   	   
//if record exists
if ($numrow==1) {
    foreach ($dbrs as $dbrow) {
		$_SESSION['username'] = $dbrow['Username'];
		$_SESSION['fname'] = $dbrow['FirstName'];
		$_SESSION['lname'] = $dbrow['LastName'];
		$_SESSION['email'] = $dbrow['UserEmail'];
	}
	$_SESSION['logindate'] = date("r");
	
    header('Location: adminhome.php'); // Jump to secured page
    } else if ($numrow==0){
		
	$_SESSION['username_input'] = $username;
	$_SESSION['timeout'] = time(); // Taking now logged in time.
	
	header('Location: admin.php?status=1'); // Jump to admin.php page with error message
}
}
?>