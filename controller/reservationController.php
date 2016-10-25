<?php

if($_POST) {

    $fname = $_POST['fname'];
    $nnumber = $_POST['nnumber'];
    $phone = $_POST['phone'];


        try{
            include ('../model/reservationModel.php');
           $reservation = new reservationModel ($fname,$nnumber,$phone);
            if($reservation == TRUE)
            {
			//echo $_SESSION['tt'];
			//echo "<script type='text/javascript'> window.alert('$_SESSION['tt']');window.location.href='./../login.php';</script>";

				//header('Location:../sign.php');		
            }
        }catch(Exception $exc)
        {
            echo $exc->getMessage();
        }



}
else {echo "no oooo";}


?>