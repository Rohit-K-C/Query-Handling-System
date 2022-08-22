<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title></title>
</head>
<body>
<div class="design">
<?php
		
				$email = $_POST['email'];
				$uname = $_POST['username'];
				$password = $_POST["password"];
				session_start();
				$username = $_SESSION['tt'];
				include "conn.php";
					$sql1 = mysqli_query($conn,"SELECT email FROM user_login");
					while ($row1 = mysqli_fetch_assoc($sql1)){
						$checkMail = $row1['email'];
						

					if ($checkMail==$email) {
						echo "<script>alert('Already exist');
						window.location.href='signup.php';</script>
								

						";
						break;

					}
					}
					


					$sql = "Insert into user_login(uname, password, email) values('$uname', '$password', '$email')";
				$res = mysqli_query($conn, $sql);
				if(!$res){
					die("Signup Failed".mysqli_error($conn));
					echo "<script>alert('Already taken');</script>";
				} 
				else{
					echo "<script>alert('Account Created Successfully');
						window.location.href='login.php';</script>
								

						";
					
				}
			
		?>
		</div>
</body>
</html>