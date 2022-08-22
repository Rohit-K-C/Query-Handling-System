<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="profile.css">
</head>
<body>
  <div class="container">
    <a href="user-homepage.php"><img src="back-icon.png" id="back"></a>

  <label id="user-name"><?php session_start(); 
                            include "conn.php";
                            $email = $_SESSION['tt'];
                            $sql = "SELECT uname FROM user_login WHERE email = '$email'";
                            $res = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                  $uname = $row['uname'];
                                    echo $row['uname'];
                                }
                            }                       
                            ?></label>
   

<div class="profile-pic-div">
  <img src="image.jpg" id="photo">
  <form action="upload-pic.php" method="POST">
  <input type="file" id="file" name="file">
  <label for="file" id="uploadBtn">Choose Photo</label>
  <input type="submit" name="submit" value="Save" id="save">
  </form>
</div>
</div>
<div id="post-details">
  <div id="items">

  <?php 
    
    include 'conn.php';
    $username = $_SESSION['tt'];
    $sql = "select * from post where username = '$username'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
      
    while($row = mysqli_fetch_assoc($res)){
       $images = $row["image"];
       $infom = $row["info"];
       $postId = $row["postID"];
      echo "  
          <h1>$uname</h1>
          
        ";

        echo "<h3>".$row['uploadDate']."</h3>";
      echo "<h2>".$row['info']."</h2>";


      
      ?>
      <img id="pimage" width="100%" height="100%" src="<?php echo $row['image']?>">
      <div id="break">
       <!--  comment section -->
        <form action="uploadComment.php" method="POST" name="myForm">
          <input type="text" name="from" value="<?php echo $username;?>" hidden>
          <input type="text" name="writtenBy" value="<?php echo $postId;?>" hidden>
          <input type="text" name="text" placeholder="Write a comment....">
          <input type="submit" name="Submit" value="post">
        </form>
        <?php
        echo "<a id='ans' href=\"viewAnswer.php?email=".$row["postID"]."\">View Answer</a>";
        ?>
        <!-- <a href="viewAnswer.php?email=$row['postID']" id="ans">View Answer</a> -->
        


        <?php
        
        // $username = $_SESSION['tt'];         
        // $count = 0;
        // $pdn= mysqli_query($conn,"SELECT postID from post WHERE username='$username'");
        // if(mysqli_num_rows($pdn)>0) {
        //     while ($rowI = mysqli_fetch_array($pdn)) {
        //       //$_SESSION['postID']=$pdn;
        //       //$pid = $_SESSION['postID'];
        //     //kateko
            
        //     //print_r($_SESSION['postID']) ;
        //     foreach ($pdn as $value) {
        //       if(implode(" ", $value)==$rowI['postID']){
        //         $pid = $value;
        //       }
            

        // $checkql = mysqli_query($conn,"SELECT likedBy FROM likes where likedBy = '$username'");
        // foreach ($checkql as $value) {
        //     if(implode(" ", $value)==$username){
        //         $count++;
        //     }
        // }
            
    //     $checkAvail = mysqli_query($conn,"SELECT * FROM likes");
    //     if(mysqli_num_rows($checkAvail)>0) {
    //         while ($rowcheck1 = mysqli_fetch_array($checkAvail)) {
    //             $u1 = $rowcheck1['likedBy'];
    //             $p = $rowcheck1['postID'];
    //    if($p !== '1500' && $u1 !== 'xxx'){

    //     $tablesql = mysqli_query($conn,"INSERT INTO likes (likedBy,postID) VALUES ('$username','$postId')");

    //     }
    //   }
    // }
        // if($count==0){
        //     $checkql = mysqli_query($conn,"SELECT * FROM likes where likedBy = '$username'");
            
        // if(mysqli_num_rows($checkql)>0) {
        //     while ($rowcheck = mysqli_fetch_array($checkql)) {
        //          $postID = $rowcheck['postID'];
        //          $likes = $rowcheck['likes'];
        //          $likedBy = $rowcheck['likedBy'];
                 
                
           
        //     if($postID==$postId && $likes ==1 && $likedBy == $username){
        //             echo"<a href='Unlike.php'>Unlike</a>";
        //     }
        //     else{
        //       echo"<a href='Likes.php'>Like</a>";
        //     }
        //     }

        //    }
        // }
        // else{
        //       $checkql = mysqli_query($conn,"SELECT * FROM likes where likedBy = '$username' AND postID = '$postId'");
            
        // if(mysqli_num_rows($checkql)>0) {
        //     while ($rowcheck = mysqli_fetch_array($checkql)) {
        //         $postID = $rowcheck['postID'];
        //          $likedBy = $rowcheck['likedBy'];
        //          $likes = $rowcheck['likes'];
                 
        //      if($postID==$postId && $likes ==1 && $likedBy == $username) {                    
        //         echo"<a href='Unlike.php'>Unlike</a>";
        //     } 
        //    else{
        //              echo"<a href='Likes.php'>Like</a>";
        //     }
        //     }

        //    }
        // }
        ?>
      </div>

        
      <?php
    }}
  //     }
  //   }
  // }
  
  ?>
  </div>
</div>
<script src="profile.js"></script>

</body>
</html>
