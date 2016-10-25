<?php


$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("localhost", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
}  else
{
    session_start();
    $msg = mysqli_real_escape_string($connection_link,$data->msg);
    $id = mysqli_real_escape_string($connection_link,$data->tid);
	$Ncontent=mysqli_real_escape_string($connection_link,$data->Ncontent);
	//print $Ncontent;
    $DID=$_SESSION['DID'];
    //mysqli_query($connection_link, "SET NAMES 'utf8'");
    //$result = mysqli_query($connection_link, $sql);
	
    
    $sql=  "INSERT INTO `task_comment` (`COMMENT`,`DID`,`DATE`,`taskID`) values('".$msg."','".$DID."',CURRENT_TIMESTAMP,'".$id."')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = mysqli_query($connection_link, $sql);
    
	
	$sql2=  "SELECT * FROM `followers` WHERE TASK_ID = '".$id."' AND DID != '".$DID."'";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $resultt = mysqli_query($connection_link, $sql2);
    while($row = mysqli_fetch_assoc($resultt))
    {
		$sql1=  "INSERT INTO `notify_activitylog` (`TOUSER`,`FROMUSER`,`NCONTENT`,`NTYPE`) values('".$row['DID']."','".$DID."','".$Ncontent."','COMMENT')";
		mysqli_query($connection_link, "SET NAMES 'utf8'");
		$result1 = mysqli_query($connection_link, $sql1);
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
    
	
	
    mysqli_close($connection_link);
}

//}
?>

