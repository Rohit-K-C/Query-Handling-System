
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script type="text/javascript">
		function breakout_of_frame() {
			if (top.location != location) {
				top.location.href = document.location.href;
			}
			// body...
		}
	</script>
</head>
<body>

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
		echo'<script>
		alert("Comment Successfull.");
		window.location.href="user-homepage.php";
		</script>';
	}

	?>
</body>
</html>
