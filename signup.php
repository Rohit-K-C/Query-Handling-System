<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="signup">
		<h1>Query Handling System</h1>
	</div>
	<div class="SU">
	<h3>Sign Up</h3>
	<form method="post" action="signup-validate.php" name="myForm" onsubmit="return validateForm()">
		<label>Email:</label><input type="email" name="email" >
		<br><br>
		<label>Username:</label><input type="text" name="username" >
		<br><br>
		<label>Password:</label><input type="Password" name="password" >
		<br><br>
		<input type="submit" value="Sign Up">
	</form>
	</div>
	
</body>
<script type="text/javascript">
	function validateForm(){
		 let email = document.forms["myForm"]["email"].value;
		 let username = document.forms["myForm"]["username"].value;
		 let password = document.forms["myForm"]["password"].value;
		 let atpos = email.indexOf("@");
       	 let dotpos = email.lastIndexOf(".");

		 
  			if (email == "" || username == "" || password == "") {
    		alert("All fields are required");
    		return false;
 						 }
 			if (email == "admin@admin") {
 				alert("Invalid email format");
 				return false;
 			}
 			if ((password.length)<6) {
 				alert("Password must be greater than 6 digits");
 				return false;
 			}
 			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){   
            alert("Please enter a valid email address.");
            return false;
        }
		}
</script>
</html>