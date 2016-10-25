<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/12/2016
 * Time: 11:11 AM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    session_start();
    $doctor = $_SESSION['DID'];
    $type = $_SESSION['TYPE'];
    if($type == "c" || $type == "C")
    {
        $sql = "SELECT `PID` ,`FNAME`,`MNAME`,`LNAME` FROM `patient` WHERE `archieve`=1 and `DID` ='".$doctor."'";
        mysqli_query($connection_link, "SET NAMES 'utf8'");
        $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
    }
    else if($type == "s" || $type == "S")
    {
        $sql = "SELECT patient.`PID`, `FNAME`, `MNAME`, `LNAME` FROM patient inner join
                  treats on patient.PID = treats.PID and patient.`archieve`=1 and treats.DID ='".$doctor."'";
        mysqli_query($connection_link, "SET NAMES 'utf8'");
        $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
    }
    # JSON-encode the response
    echo $json_response = json_encode($arr);
}
