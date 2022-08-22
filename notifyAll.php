<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		
		h1{
			text-align: left;
			font-size: 30px;
			padding-top: 20px;
			font-weight: bold;
			padding-left: 15px;
			text-shadow: 2px 2px 5px red;
		}
		.scrollabletextbox {
			border-radius: 20px;
			outline: none;
			margin-left: 25%;
    height:300px;
    width:600px;
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    font-size: 82%;
    overflow:scroll;
    resize: none;
    padding: 10px;
    font-size: 20px;
    font-family: times new roman;
}
form{
	display: flex;
	flex-direction: column;
}
input[type="submit"]{
	width: 70px;
	padding: 10px;
	border-radius: 10px;
	margin-left: 25%;
	height: 40px;
	margin-top: 10px;
	text-align: center;
	font-weight: bold;
}
	</style>
</head>
<body>
	<h1>Notify All</h1>
	<form action="uploadMessage.php" method="POST">
		<textarea class="scrollabletextbox" name="message">
  
</textarea>
		
		<input type="submit" name="Submit" value="Send">
		
	</form>

</body>
</html>