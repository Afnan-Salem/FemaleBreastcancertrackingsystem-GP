<?php
session_start();
$sender_id=$_GET['sender'];
$sender_name=$_GET['sendername'];

$_SESSION['sender_id']=$sender_id;
$_SESSION['sendername']=$sender_name;
$receiver=$_SESSION['username'];

   try{

        include "../model/Patientgetmsg.php";
        $inbox = new getmsg($sender_id,$receiver);
        if($inbox==true){
					header('Location:../view/PatientviewMessege.php');
					$_SESSION['inboxMessagesContent']=$_SESSION['MessagesContent'];
					
			}
			}
			catch(Exception $exc)
    {
        echo $exc->getMessage();
    }
	?>
