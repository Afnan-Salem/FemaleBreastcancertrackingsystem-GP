<?php

$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
}  else
{
    session_start();
    $Date=date("Y-m-d H:i:s");
	$from=$_SESSION['username'];
    $drID = mysqli_real_escape_string($connection_link,$data->to_id);
    $subject = mysqli_real_escape_string($connection_link,$data->subject);
    $msg = mysqli_real_escape_string($connection_link,$data->msg);
	
	$sql="INSERT INTO `sent_messages`( `PID`, `DID`, `SendDATE`, `SUBJECT`, `CONTENT`, `Sender`)VALUES ('".$from."','".$drID."', '".$Date."', '".$subject."', '".$msg."','".$from."')";
       mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = mysqli_query($connection_link, $sql);
        if($sql != null )
        {
            return $sql;
        }
        else
        {
            echo 'else';
            throw new Exception("there is something wrong in the message");
        }
    mysqli_close($connection_link);
    }

//}
?>

