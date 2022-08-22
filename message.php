<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="message.css">
	<title></title>
</head>
<body>
	<a href="user-homepage.php"><img src="back-icon.png" id="back"></a>
	<div class="container">
		<table>
			
			<?php
				session_start();
				$username = $_SESSION['tt']; 
				include "conn.php";
				$request = mysqli_query($conn,"SELECT email FROM followunfollow WHERE followedBy = '$username'");
				while ($row = mysqli_fetch_array($request))
				{
				$userEmail = $row['email'];
				$sql = mysqli_query($conn,"SELECT uname FROM user_login WHERE email = '$userEmail'");
				while($row1 = mysqli_fetch_array($sql)){
					echo "<tr><td><a href=\"chat.php?email=".$row["email"]."\" target='msgFrame' id='email'>".$row1['uname']."</a></td></tr>";
				}									
				
				}	
			?>
		</table>
		
	</div>
	<iframe src="" name="msgFrame"  class="frame-design" title="Iframe Example" allowtransparency = "true"></iframe>
	

</body>
</html>