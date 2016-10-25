<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 4/14/2016
 * Time: 12:41 PM
 */
//
$data = json_decode(file_get_contents("php://input"));
session_start();
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    $patient = $_SESSION['patient'];
    $doctor = $_SESSION['DID'];
    $med = mysqli_real_escape_string($connection_link,$data->medicine);
    $frequency = mysqli_real_escape_string($connection_link,$data->frequency);
    $instruction = mysqli_real_escape_string($connection_link,$data->instruction);

    $medSQL = "SELECT `DRUG_ID` FROM `drugs` WHERE `NAME`='".$med."'";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $medResult = mysqli_query($connection_link, $medSQL);
    while($row = $medResult->fetch_assoc()) //loop the rows returned from db
        $medicine = $row['DRUG_ID'];

    $date = date("Y-m-d");
    $sql = "SELECT * FROM `prescribtion` WHERE `PID`='".$patient."' and `DID` ='".$doctor."' and date (`INITIATION_DATE`)='".$date."' ";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = mysqli_query($connection_link, $sql);
    if (mysqli_num_rows($result)==1)
    {
        while($row = $result->fetch_assoc())
       { //loop the rows returned from db
            $ID = $row['PRESID'];
            $sql = "INSERT INTO `contain`(`PRESID`,`DRUG_ID`, `FREQUENCY`, `INSTRUCTIONS`) VALUES ('".$ID."','".$medicine."',
                      '".$frequency."','".$instruction."')";
            mysqli_query($connection_link, "SET NAMES 'utf8'");
            $result = mysqli_query($connection_link, $sql);
            $current = date("Y-m-d h:i:s");
            $end = date('Y-m-d H:i:s',strtotime('+24 hour',strtotime($current))); // h2f el not hena
            $period = round(24 / $frequency);
            $count = 0;
           while($count<24)
           {
               $t = substr($current, 11);
               $sql = "INSERT INTO `prescriptionnotifications`(`prescID`, `Drug`, `time`, `description`) VALUES
                        ('" . $ID . "','" . $medicine . "','" . $current . "','" . $instruction . "')";
               mysqli_query($connection_link, "SET NAMES 'utf8'");
               $res = mysqli_query($connection_link, $sql);
               $current = date('Y-m-d H:i:s', strtotime('+' . $period . ' hour', strtotime($current)));
                $count = $count + $period;
           }
        }
    }
    else
    {
        $query = "INSERT INTO `baheya`.`prescribtion` (`DID`, `PID`, `INITIATION_DATE`) VALUES ('".$doctor."','".$patient."','".$date."')";
        mysqli_query($connection_link, "SET NAMES 'utf8'");
        mysqli_query($connection_link, $query);
        $last_id = mysqli_insert_id($connection_link);
        $sql = "INSERT INTO `contain`(`PRESID`,`DRUG_ID`, `FREQUENCY`, `INSTRUCTIONS`) VALUES ('".$last_id."','".$medicine."',
              '".$frequency."','".$instruction."')";
        mysqli_query($connection_link, "SET NAMES 'utf8'");
        $result= mysqli_query($connection_link, $sql);
        $current = date("Y-m-d h:i:s");
        $end = date('Y-m-d H:i:s',strtotime('+24 hour',strtotime($current))); // h2f el not hena
        $period = round(24 / $frequency);
        $count = 0;
        while($count<24) {
            $t = substr($current, 11);
            $sql = "INSERT INTO `prescriptionnotifications`(`prescID`, `Drug`, `time`, `description`) VALUES
                        ('" . $last_id . "','" . $medicine . "','" . $current . "','" . $instruction . "')";
            mysqli_query($connection_link, "SET NAMES 'utf8'");
            $res = mysqli_query($connection_link, $sql);
            $current = date('Y-m-d H:i:s', strtotime('+' . $period . ' hour', strtotime($current)));
            $count = $count + $period;
        }
    }
    $result = mysqli_affected_rows();
    echo $json_response = json_encode($result);
//    mysqli_close($connection_link);
}
