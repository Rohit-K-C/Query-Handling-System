<?php
session_start();

$id = $_SESSION['postID'];
$uname = $_SESSION['tt'];
include "conn.php";
$sql = mysqli_query($conn,"UPDATE likes SET likes = 1, postID = '$id' WHERE likedBy = '$uname'");
// // $sql = mysqli_query($conn,"INSERT INTO likes (likes, likedBy, postID) VALUES (1, '$uname', '$id')");
 header("Location: user-homepage.php");

?>