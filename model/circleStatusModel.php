<?php
session_start();
$mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
$TASK_IDD=$_SESSION['TID'];
$color = $_GET['color'];
//echo $color." ".$TASK_IDD." ";
$query ;
	if($color=='g')
	{
		$query ="UPDATE tasks SET tasks.FLAG='$color' WHERE tasks.task_ID='$TASK_IDD'";
	}
	else if($color=='r')
	{
		$query ="UPDATE tasks SET tasks.FLAG='$color' WHERE tasks.task_ID='$TASK_IDD'";
	}
	else
	{
		$query ="UPDATE tasks SET tasks.FLAG='$color' WHERE tasks.task_ID='$TASK_IDD'";
	}
    /* if ($mysqli->query($query) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $mysqli->error;
}*/
 $mysqli->close();  
?>