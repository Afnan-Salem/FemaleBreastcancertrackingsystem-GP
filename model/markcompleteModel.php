<?php
/**
 * Created by PhpStorm.
 * User: nooor
 * Date: 6/12/2016
 * Time: 7:33 AM
 */
$servername = "localhost";
$username = "root";
$password = "baheya";
$dbname = "baheya";
session_start();
$TASK_IDD = $_SESSION['TID'];
$Ncontent =$_SESSION['mcon'];
$DID=$_SESSION['DID'];
$PID = $_SESSION['patient'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//'".$TASK_IDD."'"

$sql = " UPDATE tasks SET `STATUS`='1' WHERE `task_ID`='".$TASK_IDD."'";


if ($conn->query($sql) === TRUE) {
		
  //  echo "New record created successfully";
  $sql2=  "SELECT * FROM `followers` WHERE TASK_ID = '".$TASK_IDD."' AND DID != '".$DID."'";
    mysqli_query($conn, "SET NAMES 'utf8'");
    $resultt = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($resultt))
    {
		$sql1=  "INSERT INTO `notify_activitylog` (`TOUSER`,`FROMUSER`,`NCONTENT`,`NTYPE`) values('".$row['DID']."','".$DID."','".$Ncontent."','COMMENT')";
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result1 = mysqli_query($conn, $sql1);
		if($sql1 != null )
		{
			return $sql1;
		}
		else
		{
			echo 'else';
			throw new Exception("there is something wrong in the message");
		}
    }
	$sql3= "SELECT count(*) as `ALL` from tasks where PID=$PID";
	mysqli_query($conn, "SET NAMES 'utf8'");
    $result3 = $conn->query($sql3);
	if($result3 !=null)
		{
			$row3 = $result3->fetch_assoc();
		}
	$countAll= $row3['ALL'];
	$sql4= "SELECT count(*) as `done` from tasks where PID=$PID and STATUS='1'";
	mysqli_query($conn, "SET NAMES 'utf8'");
    $result4 = $conn->query($sql4);
	if($result4 !=null)
		{
			$row4 = $result4->fetch_assoc();
		}
	$countdone= $row4['done'];
	if($countAll==$countdone)
	{
		$sql5= "SELECT `FNAME`,`MNAME`,`LNAME`,`CELL_PHONE` from `patient` WHERE patient.PID=$PID";
	mysqli_query($conn, "SET NAMES 'utf8'");
    $result5 = $conn->query($sql5);
	if($result5 !=null)
		{
			$row5 = $result5->fetch_assoc();
		}
		$fname= $row5['LNAME']." ".$row5['MNAME']." ".$row5['FNAME'];
		$phone= $row5['CELL_PHONE'];
		include ('reservationModel.php');
        $reservation = new reservationModel ($fname,$PID,$phone);
	}
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
