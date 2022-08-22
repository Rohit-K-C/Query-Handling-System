<?php 
	include 'conn.php';
	session_start();
	$userID = $_SESSION['tt'];

	if (isset($_POST['liked'])) {
		$postID = $_POST['postID'];
		$result = mysqli_query($conn, "SELECT * FROM post WHERE id=$postID");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($conn, "INSERT INTO post (likedBy, postID) VALUES ($userID, $postID)");
		mysqli_query($conn, "UPDATE post SET likes=$n+1 WHERE id=$postID");

		echo $n+1;
		exit();
	}
	
	if (isset($_POST['unliked'])) {
		$postID = $_POST['postID'];
		$result = mysqli_query($conn, "SELECT * FROM post WHERE id=$postID");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($conn, "DELETE FROM post WHERE postID=$postID AND likedBy=$userID");
		mysqli_query($conn, "UPDATE post SET likes=$n-1 WHERE id=$postID");
		
		echo $n-1;
		exit();
	}

	// Retrieve post from the database
	$post = mysqli_query($conn, "SELECT * FROM post");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Like and unlike system</title>
	<script src="https://kit.fontawesome.com/eb11830646.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php while ($row = mysqli_fetch_array($posts)) { ?>

			<div class="post">
				<?php echo $row['text']; ?>

				<div style="padding: 2px; margin-top: 5px;">
				<?php 
					// determine if user has already liked this post
					$results = mysqli_query($con, "SELECT * FROM likes WHERE userid=1 AND postid=".$row['id']."");

					if (mysqli_num_rows($results) == 1 ): ?>
						<!-- user already likes post -->
						<span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
						<span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
					<?php else: ?>
						<!-- user has not yet liked post -->
						<span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
						<span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
					<?php endif ?>

					<span class="likes_count"><?php echo $row['likes']; ?> likes</span>
				</div>
			</div>

		<?php } ?>

<!-- Add Jquery to page -->
<script src="jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var postID = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'like-system.php',
				type: 'post',
				data: {
					'liked': 1,
					'postID': postID
				},
				success: function(response){
					$post.parent().find('span.likes_count').info(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postID = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'like-system.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postID': postID
				},
				success: function(response){
					$post.parent().find('span.likes_count').info(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});
</script>
</body>
</html>