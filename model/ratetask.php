<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 6:28 AM
 */
class gettask
{
    public function _getp($DID)
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link) {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else {

            $sql = "SELECT `PID` FROM `rate_tasks` WHERE `DID`='$DID'";
            $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

            $rows = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($rows,'pid',$row['PID']);
                }
            }
            return $rows;
        }
    }


    public function _getptask($PID)
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link) {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else {

            $sql = "SELECT COUNT(`task_ID`) as complete  FROM `tasks` WHERE `tasks`.`PID`='$PID' AND `STATUS` = '1'";
            $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   $complete = $row['complete'];
                }
            }
            return $complete;

        }
    }

    public function _getpcount($PID)
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link) {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else {

            $sql = "SELECT COUNT(`task_ID`) as complete  FROM `tasks` WHERE `tasks`.`PID`='$PID'";
            $result = $connection_link->query($sql) or die($connection_link->error . __LINE__);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $count = $row['complete'];
                }
            }
            return $count;

        }
    }

}