<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<script type="text/javascript">
		function SelectRedirect() {
			switch(document.getElementById('s1').value)
{

case "profile":
window.location="profile.php";
break;

case "logout":
window.location="logout.php";
break;

default:
window.location="user-homepage.php"; 
break;
}	
		}
	</script>
	
</head>
<?php
	session_start();
	$email = $_SESSION['tt'];
	if ($email==null) {
		echo"<script>alert('Please login first');
		window.location.href='login.php';
		</script>";
	}
	else{
		?>

<body>
	
	<div class="top-bar">
		<div class="qhs">Query Handling System</div>
		
		<div class="home">
				<a href="user-homepage.php">Home</a>
		</div>
		<div class="search">
				<form action="search.php" method="POST">
					<input type="text" name="searchName" placeholder="Enter your text">
					<input type="submit" name="search" value="Search">
				</form>
		</div>

		<div class="notification">
			<?php
		include "conn.php";
		$count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM notification where receiver='$email' or receiver='All'")); 
	 
		echo $count;
		?>
				<a href="notification.php" target="fdeg">Notification</a>
		</div>
			
		<div class="user-info">				
				<select id='s1' name='selection' onchange="SelectRedirect()">
					<option ><?php  
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
                            ?>
                            	
          </option>
					<option value="profile">Profile</option>
					<option value="logout">Logout</option>
				</select>
			</div>
			<div class="message">
				<a href="message.php">Message</a>
			</div>
			<div class="aq">
				<a href="add-question.php">Add Question</a>
			</div>
	</div>

	<div class="shortcut">

		<form action="" class="form-container">
			<input type="text" name="text" placeholder="What do you want to ask or share?"><br>
			<a href="add-question.php">Ask</a>
			<a href="#">Answer</a>
			<a href="add-question.php" id="btn1">Post</a>
			
			<script src="popup.js"></script>
		</form>
		
	</div>
	<div class="left-side-bar">
		<table>
			<tr>
			<th>Followed</th>
			</tr>
			<?php
				$username = $_SESSION['tt']; 
				include "conn.php";
				$request = mysqli_query($conn,"SELECT email FROM followunfollow WHERE followedBy = '$username'");
				while ($row = mysqli_fetch_array($request))
																	{
																	
																			echo "<tr><td>".$row['email']."</td><tr>";
																		
																	}	
			?>
		</table>
		
	</div>
	<div class="right-side-bar">
			<table>
				<tr>
					<th>You may like</th>
				</tr>
			
					<?php

														include "conn.php";
														$sql = "SELECT `user-name`, `search-list` FROM `search-history` WHERE `user-name`= '$username' ";
														$res = mysqli_query($conn,$sql);
														while ($row = mysqli_fetch_array($res))
														{
														       $name = $row['user-name'];
														       $search = $row['search-list'];
														       $sql2 = "SELECT email FROM user_login WHERE uname LIKE '%{$search}%'";
																	 $res2 = mysqli_query($conn,$sql2);
															    while ($row = mysqli_fetch_array($res2))
																	{
																		
																		$searchEmail = $row['email'];

																		$sql3 = "SELECT username,info FROM post";

																	 $res3 = mysqli_query($conn,$sql3);
																	 if (mysqli_num_rows($res3)>0) {
																	 	 while ($row1 = mysqli_fetch_array($res3))
																	{
																		if ($row1['username']==$searchEmail) {
																			echo "<tr><td>".$row1['info']."</td><tr>";
																		}
																	}	
																	}
																	 }
															   
														}
															  	
												 ?>
												 	
							
			
				
			</table>
			
		</div>

		
<div id="myFrame">
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
    $username = $_SESSION['tt'];
    $sql = "select * from post";
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
       
        ?>
      </div>

        
      <?php
    }}
  //     }
  //   }
  // }
  
  ?>
</div>  
</body>
</html>
</div>
	<!-- <iframe src="newsfeed.php" name="fdeg" id="myFrame" class="frame-design" title="Iframe Example" allowtransparency = "true"></iframe>
	<script>
    var iframe = document.getElementById("myFrame");
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script> -->

<div id="bg-modal">
	<div class="modal-container">
		<form action="" method="post" name="myForm">
			<input type="text" name="text">
		</form>
	</div>
	
</div>
<?php
}
?>
</body>
</html>