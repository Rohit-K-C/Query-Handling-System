<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="adminHomepage.css">
	<title></title>
	<style>
		#info{
			text-decoration: none;
			background-color: black;
			
			padding: 5px;
			color: white;
			border-radius: 5px;
		}
		#info:hover{
			text-decoration: none;
			background-color: black;
			opacity: 0.7;
			padding: 5px;
			color: white;
			border-radius: 5px;
		}
	</style>
</head>
<body>


</body>
</html>
<?php
$name = $_POST['searchName'];
include "conn.php";
	
		if ($name !=null) {
			echo "<table id='table' border='1px solid black' cellspacing='0' cellpadding='10px'>";
		echo "<tr>";
		echo "<th>".'Name'."</th>";
		echo "<th>".'Email'."</th>";
		echo "<th>".'Action'."</th>";
		echo "<th>".'Notification'."</th>";
		echo "</tr>";
			
$sql = mysqli_query($conn,"SELECT * FROM user_login WHERE uname LIKE '%{$name}%' ");
while ($row = mysqli_fetch_array($sql)){
	$uname = $row['uname'];
	$email = $row['email'];

	
		echo "<tr>";
        echo "<td><a href=\"admin-searchfeed.php?email=".$row["email"]."\" id='email'>".$row['uname']."</a></td>";
        echo "<td>".$row['email']."</td>";
       
        echo "<td><a id='action' href=\"userDelete.php?email=".$row["email"]."\">Delete</a></td>";
        echo "<td><a id='info' href=\"notifyOne.php?email=".$row["email"]."\">Notification</a></td>";
        // echo "<td><button class='open-button' name='btn1' onclick='openForm()''>Notification</button></td>";
        echo "</tr>";
        
    
       
}

		}
		else{
				echo '<script>
				alert("Please enter the name");	
				// window.location.href="admin-homepage.php";
		</script>';

		}
echo "</table>";

?>