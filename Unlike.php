<?php
session_start();
$uname = $_SESSION['tt'];
$id = $_SESSION['postID'];
include "conn.php";


$sql = mysqli_query($conn,"DELETE FROM likes WHERE likedBy = '$uname' AND postID = '$id'");
header("Location: user-homepage.php");

?>