<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 5:49 AM
 */
//$data = json_decode(file_get_contents("php://input"));
session_start();
$p = $_GET['name'];
echo $p;
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link) {
    throw new Exception(" Connection Failed" . mysqli_error());}
    $doctor = '2';

    $query1 = "INSERT INTO `rate_tasks`(`PID`, `DID`) VALUES ('{$_GET['name']}','$doctor')";
    mysqli_query($connection_link, $query1);

    $query2 = "UPDATE `patient` SET `prefered`='1' WHERE `archieve` ='0' AND `prefered`='0'";
    mysqli_query($connection_link, $query2);




