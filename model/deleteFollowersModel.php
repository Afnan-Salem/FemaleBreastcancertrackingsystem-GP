<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";


$TASK_ID=$_GET['TID'];
//print $TASK_ID;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM `followers` WHERE `TASK_ID`='".$TASK_ID."'";

if ($conn->query($sql) === TRUE) {
    echo "Follow";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
