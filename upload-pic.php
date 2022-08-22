<?php
<?php

	
	$image = $_POST['file'];
	session_start();
	$username = $_SESSION['tt'];
	include "conn.php";
	$sql = "Insert into user-pic(username, user-pic) values('$username', '$image')";
	$res = mysqli_query($conn, $sql);
	if(!$res){
	die("Signup Failed".mysqli_error($conn));
	} 
	else{
	header("Location: profile.php");
	
	}

?>

?>