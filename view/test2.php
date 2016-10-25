<?php
session_start();
$TASK_IDD = $_SESSION['TID'];
$PID =1;
		$conn = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
		}
        $sql3= "SELECT count(*) as `ALL` from tasks where PID=$PID";
	mysqli_query($conn, "SET NAMES 'utf8'");
    $result3 = $conn->query($sql3);
	if($result3 !=null)
		{
			$row3 = $result3->fetch_assoc();
		}
	$countAll= $row3['ALL'];
	echo "countAll=".$countAll."<br>";
	$sql4= "SELECT count(*) as `done` from tasks where PID=$PID and STATUS='1'";
	mysqli_query($conn, "SET NAMES 'utf8'");
    $result4 = $conn->query($sql4);
	if($result4 !=null)
		{
			$row4 = $result4->fetch_assoc();
		}
	$countdone= $row4['done'];
	echo "countdone=".$countdone."<br>";
	if($countAll!=$countdone)
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
		//include ('reservationModel.php');
        //$reservation = new reservationModel ($fname,$PID,$phone);
		echo $fname."  ".$phone;
	}

        
		echo $TASK_IDD."<br>";

echo "updated";

?>