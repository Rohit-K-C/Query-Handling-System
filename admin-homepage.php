<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="adminHomepage.css">
	<title></title>
	<script type="text/javascript">
		function SelectRedirect() {
			switch(document.getElementById('s1').value)
{


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
<body>
	<?php
	session_start();
	unset($_SESSION['ans']);
	$email = $_SESSION['tt'];
	if ($email==null || $email!='admin@admin') {
		echo"<script>alert('Please login first');
		window.location.href='login.php';
		</script>";
	}
	else{
		?>
	<div class="top-bar">
<h1>Welcome to Admin Page</h1>
<div class="home">
				<a href="admin-homepage.php">Home</a>
		</div>
		<div class="search">
				<form action="admin-search.php" method="POST" target="fdeg">
					<input type="text" name="searchName" placeholder="Enter your text">
					<input type="submit" name="search" value="Search">
				</form>
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
                                 
                                  $_SESSION['adminName'] = $uname;
                                    echo $row['uname'];
                                }
                            }                       
                            ?>
                            	
          			</option>
					<option value="logout">Logout</option>
				</select>
			</div>
			<div class="notification">
				<a href="notifyAll.php" target="fdeg">Notify All</a>
		</div>

</div>
<iframe src="" name="fdeg" id="myFrame" class="frame-design" title="Iframe Example" allowtransparency = "true"></iframe>
	<!-- <script>
    var iframe = document.getElementById("myFrame");
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script> -->
    <?php
}
?>
</body>
</html>