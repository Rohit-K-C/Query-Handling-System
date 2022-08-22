 


<?php
session_start();
$username = $_SESSION['tt'];

?>
<?php
include "conn.php";  
$mysqltime = date('Y-m-d H:i:s');
$detail = $_POST['text'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "uploads/".$filename;
    
    move_uploaded_file($tempname, $folder);
    $sql = "INSERT INTO post (info, image, username, uploadDate) VALUES ('$detail','$folder','$username','$mysqltime')";  
    $res = mysqli_query($conn, $sql);
    if(!$res){
	 die("Signup Failed".mysqli_error($conn));
	 } 
	 else{

	 header("Location: user-homepage.php");
	 }
  
?>