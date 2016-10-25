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

$sql = "update sent_messages set ReceiverRead = 'yes' where ReceiverRead IS NULL AND DID = '".$DID."' AND sender != '".$DID."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $result->num_rows;
echo $count;
$conn->close();
?>