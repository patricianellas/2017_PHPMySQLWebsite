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
<td><b>EnquiryID</b></td>
<td><b>EnquiryDate</b></td>
<td><b>EnquirerName</b></td>
<td><b>EnquirerEmail</b></td>
<td><b>Message</b></td>
</tr>
<?php
   include "connectdatabase.php";
   //database scripting
   $sql = "SELECT * FROM enquiry ORDER BY EnquiryDate DESC";
   $dbrs = $dbConn->prepare($sql);
   $dbrs->execute();
   
   $numrow = $dbrs->rowCount();
   echo "There are $numrow account(s) retrieved" . "\n<br>";
   
   //data allocation
   foreach ($dbrs as $dbrow) {
		echo "<tr>\n";
		echo "<td>" . $dbrow['EnquiryID'] . "</td>";
		echo "<td>" . $dbrow['EnquiryDate'] . "</td>";
		echo "<td>" . $dbrow['EnquirerName'] . "</td>";
		echo "<td>" . $dbrow['EnquirerEmail'] . "</td>";
		echo "<td>" . $dbrow['Message'] . "</td>";
		echo "</tr>\n";

   }

?>	
</table>
</body>
</html>