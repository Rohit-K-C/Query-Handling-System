<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="chat.css">
	<title></title>
</head>
<body>
	<img src="img.png" id="pp">
	<?php
		include 'conn.php';
		$email = $_GET['email'];
		echo $email;
		session_start();
		$_SESSION['TO'] = $email;


	?>
	<div class="msgDisplay">
		<iframe src="displayMsg.php" name="disFrame" class="DisFrame"></iframe>
		
	</div>
	<div class="msgArea">
		<form action="sendMsg.php" method="POST">
			<input type="text" name="message" placeholder="Aa">
			<input type="submit" name="submit" value="Send">
		</form>
		
	</div>


</body>
</html>