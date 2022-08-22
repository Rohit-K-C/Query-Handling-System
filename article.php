<!-- 
<!DOCTYPE html>
        <html>
        <head>
           
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title></title>
        </head>
        <body>
            <?php

                include 'conn.php';
               // $pID = $_SESSION['pID'];              
                $uname = $_SESSION['tt'];
                $count = 0;
                $sqlLikes = "SELECT likedBy FROM likes WHERE likedBy ='$uname'";
                $resLikes = mysqli_query($conn,$sqlLikes);
                foreach ($resLikes as $value) {
            if(implode(" ", $value)==$uname){
                $count++;
            }
        } 
           $rows = mysqli_query($conn,"SELECT COUNT(*) FROM likes"); 
           $data = mysqli_fetch_assoc($rows);
           $str = implode(" ",$data);
           $count = (int)$str;
           if($count==0){
           echo"<a href=\"Likes.php?postID=".$pID."\">Like</a>";
       }
        
        ?>
        </body>
        </html> -->