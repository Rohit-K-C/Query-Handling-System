<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="add-question.css">
	<title></title>
</head>
<body>
	<div id="message">
		<form action="post-submit.php" method="POST" enctype="multipart/form-data">
			<a href="user-homepage.php" id="cross">+</a>
			<label id="head">Add Question</label><br><br>
			<hr id="hr">
			<input type="text" name="text" placeholder="What's on you mind?"><br>
			<div class="upload-pic">
				<img src="" id="image" >
				<input type="file" id="file" name="uploadfile">
				<label for="file" id="uploadBtn">Image</label>	
						
			</div>
			<input type="submit" name="submit" value="Post" id="post">
			
		</form><br>
		
		
	</div>
	
<script src="app.js"></script>
</body>
</html>