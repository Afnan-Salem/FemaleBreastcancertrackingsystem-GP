<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 5/19/2016
 * Time: 7:29 PM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
    $ID = $_GET['ID'];
    $doctor = $_GET['doctor'];
    $sql = "DELETE FROM `followers` WHERE `TASK_ID` = '".$ID."'";

    $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);
    $result =  $connection_link->affected_rows;
    if($result >0)
    {
        $query = "DELETE FROM `tasks` WHERE `task_ID` = '".$ID."'";
        $res2 = $connection_link->query($query) or die($connection_link->error . __LINE__);
        $res2 = $connection_link->affected_rows;
        echo $json_response = json_encode($res2);
    }
# JSON-encode the response
        echo $json_response = json_encode($result);
}
?>
