<?php
include "conn.php";
$email = $_GET['email'];
$sql = mysqli_query($conn,"DELETE FROM user_login WHERE email='$email'");
if(!$sql){
		die("Failed to Delete".mysqli_connect_error());
	}
	else{
		echo '<script>
				alert("Successfully Deleted.");	
				
				
		</script>';
	}

	?>
