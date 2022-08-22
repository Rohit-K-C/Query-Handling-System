<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="notification.css">
	<title></title>
</head>
<body>

</body>
</html>
<?php
session_start();
$email = $_SESSION['tt'];
include 'conn.php';
echo "<table border='1px'>";
$sql = mysqli_query($conn,"SELECT * FROM notification where receiver = '$email'");
while($row=mysqli_fetch_assoc($sql)){
	$sender = $row['sender'];
	$receiver = $row['receiver'];
	$message = $row['message'];
	

}

?>