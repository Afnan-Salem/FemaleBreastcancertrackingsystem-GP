<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";
$TASK_ID=$_GET['TID'];
echo '<script>alert($TASK_ID); </script>';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `archive_task`(`TASK_ID`, `DID`)
VALUES (".$TASK_ID.",'".$_SESSION['DID']."')";

if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
