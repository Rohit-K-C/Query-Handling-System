	<!DOCTYPE html>
	<html>
	<head>
		<style>
			body{
				background-color: lightgrey;
			}
			#name{
				
				text-decoration: none;
				background-color: white;
				color: black;
				width: auto;
				padding: 10px;
				text-align: center;
				margin-top: 10px;
				border-radius: 10px;
			}
		
			img{
				width: 30px;
				height: 30px;
			}
			.container{
				margin-top: 20px;
				margin-left: 25%;
				
				width:50%;
				text-align: left;
				
			}
			#email {
				text-decoration: none;
				color: black;
				background-color: whitesmoke;
				padding: 5px;
				border-radius: 10px;
			}
		</style>
		<title></title>
	</head>
	<body>
	<a href="user-homepage.php"><img src="back-icon.png"></a>
	
	<?php 

		$name = $_POST['searchName'];
		session_start();
		$username = $_SESSION['tt'];
		include 'conn.php';
		if ($name !=null) {
			
		$ser = mysqli_query($conn,"SELECT `search-list` FROM `search-history` WHERE `user-name`='$username'");
		// print_r($ser);
		//$list = mysqli_fetch_assoc($ser);
		//echo $list;
		$count=0;
		foreach ($ser as $value) {

			if(implode(" ", $value)==$name){
				$count++;
			}
		}
		if($count==0){
			$insert = mysqli_query($conn,"INSERT INTO `search-history` (`user-name`,`search-list`) VALUES ('$username','$name')" );
			
			$result = mysqli_query($conn, "SELECT * FROM user_login WHERE uname LIKE '%{$name}%'");
			while ($row = mysqli_fetch_array($result))
			{

		$myVariable = $row['uname'];
		$_SESSION['varname'] = $myVariable;
		echo "<div class='container'>";
        // echo "<a id='name' href='viewprofile.php'>".$row['uname']."</a><br><br>";
        echo "<td><a href=\"viewprofile.php?email=".$row["email"]."\" target='_blank' id='email'>".$row['uname']."</a></td>";
        echo "<br>";
        echo "</div>";
			}
		}
		else{
			$result = mysqli_query($conn, "SELECT * FROM user_login WHERE uname LIKE '%{$name}%'");
			while ($row = mysqli_fetch_array($result))
			{

		$myVariable = $row['uname'];
		$_SESSION['varname'] = $myVariable;
		echo "<div class='container'>";
        // echo "<a id='name' href='viewprofile.php'>".$row['uname']."</a><br><br>";
        echo "<td><a href=\"viewprofile.php?email=".$row["email"]."\" target='_blank' id='email'>".$row['uname']."</a></td>";
        echo "<br>";
        echo "</div>";
			}
		}
		
		

		
				
				
				
				

			// 	}
			// 	else{
		// 			$result = mysqli_query($conn, "SELECT * FROM user_login WHERE uname LIKE '%{$name}%'");
		// 	while ($row = mysqli_fetch_array($result))
		// 	{

		// $myVariable = $row['uname'];
		// $_SESSION['varname'] = $myVariable;
		
		// echo $_SESSION['varname'];
		// echo "<div class='container'>";
  //       echo "<a id='name' href='viewprofile.php'>".$row['uname']."</a><br><br>";
  //       echo "<td><a href=\"viewprofile.php?email=".$row["email"]."\" target='_blank' id='email'>View</a></td>";
  //       echo "<br>";
  //       echo "</div>";
		// 	}
		// }
			
			// foreach ($list as $value) {
			// 		echo $value;
			// 		// if ($name != $value) {
			// 		// $insert = mysqli_query($conn,"INSERT INTO `search-history` (`user-name`,`search-list`) VALUES ('$username','$name')" );
					
			// 	}	

			

		
		

			
			
   
			
		
				

			
		
		// code...
		}
		else
		{
			echo '<script>
				alert("Please enter the name");	
				window.location.href="user-homepage.php";
		</script>';
		}
	
	?>
	</body>
	</html>