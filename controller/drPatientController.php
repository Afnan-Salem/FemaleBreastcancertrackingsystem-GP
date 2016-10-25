<?php
/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 29/04/2016
 * Time: 10:58 م
 */
session_start();
$DID=$_SESSION['DID'];
$type = $_SESSION['TYPE'];

try {
    include "../model/drPatientModel.php";
    $drpatientmodel = new drPatientModel($DID,$type);
    if($drpatientmodel==true){
        header('Location:../view/drpatient.php');
        //echo $type;
        $_SESSION['drPatientS']=$_SESSION['drPatientSession'];
    }
}
catch(Exception $exc)
{
    echo $exc->getMessage();
}
?>