<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/11/2016
 * Time: 12:24 AM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
    session_start();
    $patient = $_GET['ID'];
    $type = $_SESSION['TYPE'];
    $doctor = $_SESSION['DID'];
    if($type=='c'||$type=='C')
    {
        $sql = "UPDATE `patient` SET `archieve`= 1 WHERE `PID` = '".$patient."'";

        $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);
        $result =  $connection_link->affected_rows;
        echo $json_response = json_encode($result);
    }
}
?>
