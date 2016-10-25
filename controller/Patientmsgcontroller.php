<?php
/**
 * Created by PhpStorm.
 * User: nooor
 * Date: 3/10/2016
 * Time: 8:11 AM
 */
if($_POST) {
    /*if (isset($_POST['submit']) AND $_POST['submit'] == "ارسل")
    {*/

        $drID = $_POST['الى'];
        $subject = $_POST['subject'];
        $message = $_POST['msg'];
        try {
            include "../model/PatientsentMsg.php";
            $sendmsg = new sentmsg($drID, $subject, $message);

            if ($sendmsg != null)
            {
               header('Location:../view/allMesseges.php');
            }


        }
        catch (Exception $exc)
        {
            echo $exc->getMessage();
        }

    //}
   /* else
    {
        echo  'error!';
    }*/

}

?>