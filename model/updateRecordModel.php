<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 4/5/2016
 * Time: 10:17 PM
 */
$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    session_start();
    $patient = $_SESSION['patient'];
    $node = mysqli_real_escape_string($connection_link,$data->node);
    echo "test";
    $sql ="UPDATE `record` SET `SENTINEL_NODE_BIOPSY`= '".$node."' WHERE `PID`='".$patient."'";
    //$sql = "INSERT INTO `tahany`(`ID`, `name`, `age`) VALUES ('".$patient."','".$node."',3)";
    $result = mysqli_query($connection_link, $sql);
//    if($result)
//        echo "yes";
//    else
//        echo "noooo";

}
