<?php
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";
$TASK_ID=$_GET['TID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1 = "DELETE FROM `archive_task` WHERE `TASK_ID`='".$TASK_ID."'";
if ($conn->query($sql1) === TRUE) {
    
}
$sql2 = "DELETE FROM `followers` WHERE `TASK_ID`='".$TASK_ID."'";
if ($conn->query($sql2) === TRUE) {
    
}
$sql = "DELETE FROM `tasks` WHERE `task_ID`='".$TASK_ID."'";

if ($conn->query($sql) === TRUE) {
   
}
$sql4 = "DELETE FROM `task_comment` WHERE `taskID`='".$TASK_ID."'";

if ($conn->query($sql4) === TRUE) {
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
