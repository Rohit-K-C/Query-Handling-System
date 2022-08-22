<?php
include "conn.php";
$commentedBy = $_POST['from'];
$comment = $_POST['text'];
$postID = $_POST['writtenBy'];

$sql2 = mysqli_query($conn,"INSERT INTO comments (comments, post_id, commentedBy) VALUES ('$comment','$postID','$commentedBy')");
if(!$sql2){
		die("Failed to Comment".mysqli_connect_error());
	}
	else{
		echo '<script>
				alert("Commented.");	
				window.location.href="profile.php";
		</script>';
	}

	?>
