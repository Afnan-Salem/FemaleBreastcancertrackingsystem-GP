<?php
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}
session_start();
$DID = $_SESSION['DID'];

$query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                  WHERE `type`='t' AND `DRseen`='0' AND `DID`='$DID'";
$result2 = $conn->query($query);
$row2 = $result2->fetch_assoc();
$count2 = $result2->num_rows;
				  
$sql = "SELECT status from notify_activitylog where status = 'unread' AND `TOUSER`='$DID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $result->num_rows;
$countall = $count + $count2;
echo $countall;
$conn->close();
?>