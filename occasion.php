<!-- Student Name = Patricia Nellas-----------
-----Student ID = 21503005--------------------
-----Class = IT6x30---------------------------
-----Tutor = Iwan Tjhin---------------------->
<html>
<head>
	<title>Occasion</title>
</head>
<header>
	<!--References to CSS-->
	<link rel="stylesheet" type="text/css" href="rosetta.css">
</header>

<body class="lookup" background="occasion.jpg">
	

<!-- Top Navigation bar-->
<?php
include "topnavigationbar.php";
?>
	
	<div >
		<center><table class="maintable">
			<tr>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Congratulations' ?>"><img src="congratulations.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">CONGRATULATIONS</a></td>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Sympathy' ?>"><img src="sympathy.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">SYMPATHY</a></td>
			</tr>
			<tr class="space"></tr>
			<tr>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Get Well' ?>"><img src="getwell.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">GET WELL</a></td>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Birthday' ?>"><img src="birthday.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">BIRTHDAY</a></td>
			</tr>
			<tr class="space"></tr>
			<tr>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Valentine\'s Day' ?>"><img src="valentinesday.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">VALENTINE'S DAY</a></td>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Weddings' ?>"><img src="weddings.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">WEDDINGS</a></td>
			</tr>
			<tr class="space"></tr>
			<tr>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Anniversary' ?>"><img src="anniversary.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">ANNIVERSARY</a></td>
				<td class="image"><a href="occasionlookup.php?occasion=<?php echo 'Thank You' ?>"><img src="thankyou.jpg" height="100" width="100"></a></td>
				<td class="description"><a class="link">THANK YOU</a></td>
			</tr>
		</table>
	</div>
</body>

<footer>
</footer>
</html>