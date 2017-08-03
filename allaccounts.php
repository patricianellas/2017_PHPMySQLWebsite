<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<html>
<head>
<style>
  table {
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid black;
	background: white;
    padding: 10px;
    text-align: left;
  }
</style>
</head>
<body>
<div >
<center><table class="maintable">
<tr>
<td><b>Username</b></td>
<td><b>Password</b></td>
<td><b>First Name</b></td>
<td><b>Last Name</b></td>
<td><b>Email Address</b></td>
<td><b>Phone Number</b></td>
<td><b>Address</b></td>
</tr>
<?php
//DATABASE SCRIPTING
   include "connectdatabase.php";
   
   $sql = "SELECT * FROM account";
   $dbrs = $dbConn->prepare($sql);
   $dbrs->execute();
   
   $numrow = $dbrs->rowCount();
   echo "$numrow account(s) retrieved" . "\n<br>";
   
   
   foreach ($dbrs as $dbrow) {
		echo "<tr>\n";
		echo "<td>" . $dbrow['Username'] . "</td>";
		echo "<td>" . $dbrow['Password'] . "</td>";
		echo "<td>" . $dbrow['FirstName'] . "</td>";
		echo "<td>" . $dbrow['LastName'] . "</td>";
		echo "<td>" . $dbrow['UserEmail'] . "</td>";
		echo "<td>" . $dbrow['UserPhone'] . "</td>";
		echo "<td>" . $dbrow['UserAddress'] . "</td>";
		echo "</tr>\n";

   }

?>	
</table>
</body>
</html>