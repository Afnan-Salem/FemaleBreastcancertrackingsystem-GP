<?php
//session_start();
$sender_id=$_SESSION['sender_id'];
$sender_name=$_SESSION['sendername'];
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
		echo "jkhk";
    }
	?>
