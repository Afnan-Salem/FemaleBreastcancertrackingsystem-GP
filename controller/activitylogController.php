<?php
/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 16/06/2016
 * Time: 07:06 ??
 */

session_start();
$DID =$_SESSION['DID'];

try {
    include "../model/activitylogModel.php";
    $activitylogmodel = new activitylogModel($DID);
    if($activitylogmodel==true){

        header('Location:../view/viewactivitylog.php');

        $_SESSION['activitylogSt']=$_SESSION['activitylogSessiontask'];
        $_SESSION['activitylogSc']=$_SESSION['activitylogSessioncomment'];
    }
}
catch(Exception $exc)
{
    echo $exc->getMessage();
}

?>