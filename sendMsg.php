<?php
	
	session_start();
	$msgTo = $_SESSION['TO'];
	$message = $_POST['message'];
	$msgFrom = $_SESSION['tt'];
	$date = date('Y-m-d H:i:s');
	include 'conn.php';
	
	$sql = mysqli_query($conn,"INSERT INTO chat (fromUser, toUser, msg, date) VALUES ('$msgFrom','$msgTo','$message','$date')");
?>