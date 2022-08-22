
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

  <label id="user-name">
    <?php 
         $email = $_GET['email'];  
         echo $email;                  
     ?>
 </label>
  <label id="follower">
    <?php
        $email = $_GET['email'];
        session_start();
        $username = $_SESSION['tt']; 
        $_SESSION['follower'] = $email;
        include 'conn.php';
        $count = 0;
        $checkql = mysqli_query($conn,"SELECT email FROM followunfollow where email = '$email' AND followedBy='$username'");
        foreach ($checkql as $value) {
            if(implode(" ", $value)==$email){
                $count++;
            }
        }
        // echo $count;
        
        if($count==0){
            $tablesql = mysqli_query($conn,"INSERT INTO followunfollow (email,followedBy) VALUES ('$email','$username')");
            $checkql = mysqli_query($conn,"SELECT * FROM followunfollow where email = '$email'");
            
        if(mysqli_num_rows($checkql)>0) {
            while ($rowcheck = mysqli_fetch_array($checkql)) {
                 $tableEmail = $rowcheck['email'];
                 $follow = $rowcheck['follow'];
                 $followedBy = $rowcheck['followedBy'];
             // if($email==$tableEmail && $follow ==0 && $followedBy == null) {                    
                echo"<a href='followUser.php' id='follow'>Follow</a>";
            // } 
            // if($email==$tableEmail && $follow ==1 && $followedBy == $username){
            //         echo"<a href='unfollowUser.php' id='unfollow'>Unfollow</a>";
            // }
            }

           }
        }
        else{
              $checkql = mysqli_query($conn,"SELECT * FROM followunfollow where email = '$email' AND followedBy = '$username'");
            
        if(mysqli_num_rows($checkql)>0) {
            while ($rowcheck = mysqli_fetch_array($checkql)) {
                $checkemail = $rowcheck['email'];
                 $tableEmail = $rowcheck['email'];
                 $follow = $rowcheck['follow'];
                 $followedBy = $rowcheck['followedBy'];
             if($email==$tableEmail && $follow ==1 && $followedBy == $username) {                    
                echo"<a href='unfollowUser.php' id='unfollow'>Unfollow</a>";
            } 
            // else{
                    // echo"<a href='unfollowUser.php' id='unfollow'>Unfollow</a>";
            // }
            }

           }
        }
        
        
        
        // else{
        //             echo"<a href='unfollowUser.php' id='unfollow'>Unfollow</a>";
        //     }
           
        
        
        
        // $res = mysqli_query($conn,"SELECT * FROM followunfollow");
        // if(mysqli_num_rows($res)>0){
        //     while ($row = mysqli_fetch_array($res))    
        //     {
            
        //     $tableEmail = $row['email'];
        //     $follow = $row['follow'];
        //     $followedBy = $row['followedBy'];

        //      if ($email==$tableEmail && $follow ==0) {
               

                
        //         if ($follow == 0 && $followedBy == null){
                    
        //                 echo"<a href='followUser.php' id='follow'>Follow</a>";
        //     } 
        //     else{
        //             echo"<a href='unfollowUser.php' id='unfollow'>Unfollow</a>";
        //     }

        //    }
              
        //         }


          

            
        //     }

             
        
        

    ?>
</label>
 

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
    $email = $_GET['email']; 
    include 'conn.php';
    $sql = "select * from post where username = '$email'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
      
    while($row = mysqli_fetch_assoc($res)){
       $images = $row["image"];
       $infom = $row["info"];
       $postId = $row["postID"];
      echo "  
          <h1>$email</h1>
          
        ";
        echo "<h3>".$row['uploadDate']."</h3>";
      echo "<h2>".$row['info']."</h2>";
      
      ?>
      <img id="pimage" width="100%" height="100%" src="<?php echo $row['image']?>">
       <div id="break">
       <!--  comment section -->
        <form action="uploadComment.php" method="POST">
          <input type="text" name="from" value="<?php echo $username;?>" hidden>
          <input type="text" name="writtenBy" value="<?php echo $postId;?>" hidden>
          <input type="text" name="text" placeholder="Write a comment....">
          <input type="submit" name="Submit" value="post">
        </form>
        <a href="viewAnswer.php" id="ans">View Answer</a>
        <?php  
            
        ?>
        
        
        
      </div>

        
      <?php
      
    }
  }
  
  ?>
  </div>
</div>
<script src="profile.js"></script>

</body>
</html>