<?php
include "conn.php";
session_start();
$adminEmail = $_SESSION['adminName'];
$message = $_POST['message'];
$receiver = $_POST['email'];

$sql = mysqli_query($conn,"INSERT INTO notification (sender,receiver,message) VALUES ('$adminEmail','$receiver','$message')");
if(!$sql){
		die("Failed to Send".mysqli_connect_error());
	}
	else{
		echo '<script>
				alert("Successfully Sent.");	
				
		</script>';
	}
?>