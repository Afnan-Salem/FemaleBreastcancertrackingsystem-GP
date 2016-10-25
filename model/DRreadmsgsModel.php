<?php
session_start();
$senderID=$_SESSION['sender_id'];

$receiver=$_SESSION['DID'];
$date = date('y/m/d h:i:s', time());
							 $conn = new mysqli("localhost", "root", "baheya", "baheya");

							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							} 

							$sql = "UPDATE sent_messages SET ReadDate='".$date."' ,ReceiverRead='yes' WHERE DID='".$receiver."' and sender='".$senderID."'";

							if ($conn->query($sql) === TRUE) {
								//include_once("../controller/Patientinboxgetmsg.php");
							} else {
								echo "Error updating record: " . $conn->error;
							}

							$conn->close();
							?>