<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 4:36 AM
 */
//session_start();
//$data = json_decode(file_get_contents("php://input"));
class getting
{
    public function _get()
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else
        {
            session_start();
            $doctor = '2';
            $type = 'c';

            if($type == "c" || $type == "C")
            {
                $sql = "SELECT `PID` ,`FNAME` FROM `patient` WHERE `archieve`=0 and `DID` ='".$doctor."'
                    and PID not in (SELECT `PID` FROM `rate_tasks` WHERE `DID` = '$doctor')";
                mysqli_query($connection_link, "SET NAMES 'utf8'");
                $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

                $rows = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($rows,'pid',$row['PID']);
                        array_push($rows,'name',$row['FNAME']);
                    }
                }
            }
            else if($type == "s" || $type == "S")
            {
                $sql = "SELECT `PID` ,`FNAME` FROM `patient` WHERE `archieve`=0 and `DID` ='".$doctor."'
                    and PID not in (SELECT `PID` FROM `rate_tasks` WHERE `DID`= '$doctor')";
                mysqli_query($connection_link, "SET NAMES 'utf8'");
                $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

                $rows = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($rows,'id',$row['PID']);
                        array_push($rows,'name',$row['FNAME']);
                    }
                }
            }
            return $rows;
            # JSON-encode the response
           // echo $json_response = json_encode($arr);
        }
    }
    public  function _getrated()
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else
        {
            $sql = "SELECT `PID` FROM `rate_tasks` WHERE `DID`='2'";
            mysqli_query($connection_link, "SET NAMES 'utf8'");
            $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

            $rows = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($rows,'id',$row['PID']);
                }
            }
            return $rows;
        }
    }
}
