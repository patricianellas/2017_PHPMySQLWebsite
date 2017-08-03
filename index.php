<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php 
session_start();
//unsets session
unset($_SESSION['username']);
?>


<html>
<head>
	<title>Home</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="main" background="background.jpg">

	<!-- Top Navigation bar-->
	<div class="topnav" id="myTopnav">
	  <a class="left" href="index.php">Home</a>
	  <a class="left" href="about.php">About</a>
	  <a class="left" href="type.php">Type</a>
	  <a class="left" href="occasion.php">Occasion</a>
	  <a class="left" href="contact.php">Contact</a>  
	  <a class="right" href="admin.php"><img src="login.png" height="20" width="20"> Admin</a>
	</div>
	<div class="content">
	
	
	<p class="message">
	Your number one flower shop in New Zealand
	</p>
	<p class="name">Rosetta Gardens</p>
	</div>

	</div>

</body>


</html>