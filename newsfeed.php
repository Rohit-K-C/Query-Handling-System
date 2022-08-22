<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="newsfeed.css">
</head>
<body>

	<div id="post-details">
  <!-- <div id="items"> -->

  <?php 
    
    include 'conn.php';
    session_start();
     $username = $_SESSION['tt'];
    $sql = "select * from post";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
      
    while($row = mysqli_fetch_assoc($res)){
       $images = $row["image"];
       $infom = $row["info"];
       $postId = $row["postID"];
       $uname = $row["username"];
      echo "  
          <h1>$uname</h1>
          
        ";
        echo "<h3>".$row['uploadDate']."</h3>";
      echo "<h2>".$row['info']."</h2>";
      
      ?>
      <img id="pimage" width="100%" height="100%" src="<?php echo $row['image']?>">
      <div id="break">
       <!--  comment section -->
        <form action="uploadCommentHome.php" method="POST">
          <input type="text" name="from" value="<?php echo $username;?>" hidden>
          <input type="text" name="writtenBy" value="<?php echo $postId;?>" hidden>
          <input type="text" name="text" placeholder="Write a comment....">
          <input type="submit" name="Submit" value="post">
        </form>
        <a href="viewAnswer.php" id="ans">View Answer</a>
        
        <?php?>
      </div>

        
      <?php
      
    }
  }
  
  ?>
</div>  
</body>
</html>