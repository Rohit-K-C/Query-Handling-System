<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="chat.css">
</head>
<body>
<?php
session_start();
	$msgTo = $_SESSION['TO'];
	$msgFrom = $_SESSION['tt'];
	include 'conn.php';
	$sql1 = mysqli_query($conn,"SELECT msg, date From chat WHERE toUser = '$msgFrom' AND fromUser = '$msgTo'");
	if (mysqli_num_rows($sql1)>0) {
            while ($row1 = mysqli_fetch_array($sql1)) {
                $message1 = $row1['msg'];
                $timeReceive = $row1['date'];

            }}
	$sql = mysqli_query($conn,"SELECT msg, date From chat WHERE toUser = '$msgTo' AND fromUser = '$msgFrom'");
	if (mysqli_num_rows($sql)>0) {
            while ($row = mysqli_fetch_array($sql)) {
                $message = $row['msg'];
                $timeSend = $row['date'];
    //             echo "<div id='sender'>";
    //             echo "<label id='send'>".$row['msg']."</label><br><br><br>";
    //             echo "<label id='timeSend'>".$timeSend."</label><br><br><br>";
    //             echo "</div>";
    //             echo "<div id='receiver'>";
    //             echo "<label id='receive'>".$message1."</label><br><br><br>";
				// echo "<label id='timeReceive'>".$timeReceive."</label><br><br><br>";
    //             echo "</div>";
                
                
            }

        }
        if ($timeSend>$timeReceive) {
        	echo "<div id='receiver'>";
                echo "<label id='receive'>".$message1."</label><br><br><br>";
				echo "<label id='timeReceive'>".$timeReceive."</label><br><br><br>";
                echo "</div>";
                echo "<div id='sender'>";
                echo "<label id='send'>".$message."</label><br><br><br>";
                echo "<label id='timeSend'>".$timeSend."</label><br><br><br>";
                echo "</div>";
        }
        else{
    			echo "<div id='sender'>";
                echo "<label id='send'>".$message."</label><br><br><br>";
                echo "<label id='timeSend'>".$timeSend."</label><br><br><br>";
                echo "</div>";
                echo "<div id='receiver'>";
                echo "<label id='receive'>".$message1."</label><br><br><br>";
				echo "<label id='timeReceive'>".$timeReceive."</label><br><br><br>";
                echo "</div>";
            }
?>

</body>
</html>

