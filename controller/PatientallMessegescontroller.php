<?php
session_start();
$PID=$_SESSION['username'];
try {
            include "../model/PatientallMessegesModel.php";
            $inbox = new inbox($PID);
			if($inbox==true){
					header('Location:../view/allMesseges.php');
					
					$_SESSION['inboxMessages']=$_SESSION['Messages'];
					
			}
			}
			catch(Exception $exc)
    {
        echo $exc->getMessage();
    }
?>