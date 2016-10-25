<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";


$TASK_ID=$_GET['TID'];
//print $TASK_ID;
//echo '<script>alert($TASK_ID); </script>';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check conection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//print 'hiii';
$sql = "INSERT INTO `followers`(`TASK_ID`, `DID`)
VALUES ('".$TASK_ID."','".$_SESSION['DID']."')";

 mysqli_query($conn, "SET NAMES 'utf8'");
    $result = mysqli_query($conn, $sql);
if ($result != null) {
  echo 'UnFollow';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
