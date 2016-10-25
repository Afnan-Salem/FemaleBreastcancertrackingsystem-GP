<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/10/2016
 * Time: 5:03 PM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
    session_start();
    $patient = $_GET['ID'];
    $prefere = $_GET['prefered'];
    $type = $_SESSION['TYPE'];
    $doctor = $_SESSION['DID'];
    if($type=='c'||$type=='C')
    {
       if($prefere=='1')//then non prefer
            $sql = "UPDATE `patient` SET `prefered`= 0 WHERE `PID` = '".$patient."'";
       else if ($prefere=='0')//prefere
           $sql = "UPDATE `patient` SET `prefered`= 1 WHERE `PID` = '".$patient."'";

        $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);
        $result =  $connection_link->affected_rows;
        echo $json_response = json_encode($result);
    }
    else if ($type=='s'||$type=='S')
    {
        if($prefere=='1')//then non prefer
            $sql = "UPDATE `treats` SET `prefered`=0 WHERE `DID` = '".$doctor."' and `PID` = '".$patient."'";
        else if ($prefere=='0')//prefere
            $sql = "UPDATE `treats` SET `prefered`=1 WHERE `DID` = '".$doctor."' and `PID` = '".$patient."'";

        $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);
        $result =  $connection_link->affected_rows;
        echo $json_response = json_encode($result);
    }
}
?>
