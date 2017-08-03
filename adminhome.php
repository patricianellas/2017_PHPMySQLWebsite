<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<?php   session_start();  
//checks session
if ($_SESSION['username'] == NULL) {
	//jumps back to page
	header('Location: admin.php?status=2');
	die();
}
?>

<html>
<head>
	<title>Administrator Page</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="main">
	<div class="top">
		<p class="title">Rosetta Gardens - Administrator Page</p>
	</div>
	
	<ul>
		  <li><a class="active" href="adminhome.php">Home</a></li>
		  <li><a href="accounts.php">Accounts</a></li>
		  <li><a href="flowers.php">Flowers</a></li>
		  <li><a href="occasionsadmin.php">Occasions</a></li>
		  <li><a href="enquiries.php">Enquiries</a></li>
		  <li><a href="index.php">Logout</a></li>
	</ul>

	
	<div class="admincontent">
	  <h1>Welcome <?php echo $_SESSION['fname']; echo '&nbsp'; echo $_SESSION['lname'];?>!</h1>
	  <p>Login time: <?php echo $_SESSION['logindate'];?></p>
	  <h3>This is a sample admin page for Rosetta Gardens webpage </h3>
	  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eleifend porttitor orci, 
	  et facilisis diam blandit vitae. Morbi venenatis fringilla nunc ac sollicitudin. 
	  Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
	  Nam elementum, tortor vel consectetur semper, nunc quam pretium magna, et faucibus mauris 
	  velit quis ligula. Sed cursus, justo id fermentum facilisis, odio turpis laoreet nisi, 
	  eu condimentum nisl eros sed mi. Pellentesque luctus venenatis ipsum, 
	  convallis sagittis elit feugiat aliquam. Suspendisse ac est odio.</p>

</div>
</body>


</html>