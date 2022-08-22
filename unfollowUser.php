<?php
session_start();
$id = $_SESSION['tt'];
$variable = $_SESSION['follower'];
include "conn.php";


$sql = mysqli_query($conn,"DELETE FROM followunfollow WHERE email = '$variable' AND followedBy='$id'");
$sql2 = mysqli_query($conn,"DELETE FROM `search-history` WHERE `user-name`='$id'  AND `search-list` LIKE '%{$_SESSION['varname']}%'");

header("Location: user-homepage.php");

?>