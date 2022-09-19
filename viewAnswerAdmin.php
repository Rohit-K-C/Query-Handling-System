<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="viewAnswer.css">
</head>
<body>

<!-- <a href="user-homepage.php"><img src="back-icon.png" id="back"></a> -->
</body>
</html>
<?php
include 'conn.php';
$postId = $_GET['email'];
$sql = mysqli_query($conn,"SELECT * FROM comments where post_id = '$postId'");
while($row=mysqli_fetch_assoc($sql)){
	$commentedBy = $row['commentedBy'];
	$comment = $row['comments'];
	$postId = $row['post_id'];
	echo "<div id='container'>";
	echo"<img src='img.png' id='pp'>";

	echo "<div id='cmtBy'>".$row['commentedBy']."</div><br>";
	echo "<div id='cmt'>".$row['comments']."</div>";
	echo "</div>";


}
     
$sql1 = mysqli_query($conn,"SELECT * from post WHERE postID='$postId'");
	while($row1=mysqli_fetch_assoc($sql1)){
		$uname = $row1['username'];
		$images = $row1["image"];
       $infom = $row1["info"];
       $pid = $row1["postID"];

$sql = "SELECT uname FROM user_login WHERE email = '$uname'";
                            $res = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                  $username = $row['uname'];
                                    
                                }
                            }  
                            
    }
	
?>

