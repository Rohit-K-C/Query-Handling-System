<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="adminnewsfeed.css">
</head>
<body>

  <div id="post-details">
  <!-- <div id="items"> -->

  <?php 
    
    include 'conn.php';
    $email = $_GET['email'];
    session_start();
    $_SESSION['ans'] = $email;
    $sql = "select * from post where username='$email'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
      
    while($row = mysqli_fetch_assoc($res)){
      $pid = $row["postID"];
       $images = $row["image"];
       $infom = $row["info"];
       $uname = $row["username"];
      echo "  
          <h1>$uname</h1>
          
        ";
        echo "<h3>".$row['uploadDate']."</h3>";
      echo "<h2>".$row['info']."</h2>";
      
      ?>
      <img id="pimage" width="100%" height="100%" src="<?php echo $row['image']?>">
      <div id="break">
        <form action="uploadComment.php" method="POST">
          <input type="text" name="text" placeholder="Write a comment....">
          <input type="submit" name="Submit" value="post">
        </form>
        <?php
        echo "<a href=\"viewAnswerAdmin.php?email=".$row["postID"]."\" id='ans'>View Answer</a>";
        ?>

         <!-- <a href="viewAnswerAdmin.php?pid='.$row['postID'].'" id="ans">View Answer</a> -->
        
        
      </div>

        
      <?php
      
    }
  }
  
  ?>
</div>  
</body>
</html>