<?php
session_start();
$id = $_SESSION['tt'];
$variable = $_SESSION['follower'];
include "conn.php";
$sql = mysqli_query($conn,"UPDATE followunfollow SET follow = 1, followedBy = '$id' WHERE email = '$variable' AND followedBy='$id'");
header("Location: user-homepage.php");

?>