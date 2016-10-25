<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/28/2016
 * Time: 9:30 PM
 */
class drNotificationModel
{
    public function _getSeenNotifications($DID)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                  WHERE `type`='t' AND `DRseen`='1' AND `DID`='$DID'";
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'pid',$row['PID']);
            array_push($rows,'name',$row['DName']);
            array_push($rows,'title',$row['title']);
            array_push($rows,'Date',$row['Date']);

        }
        return $rows;

    }

    public function _getUnseenNotifications($DID)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                  WHERE `type`='t' AND `DRseen`='0' AND `DID`='$DID'";
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'pid',$row['PID']);
            array_push($rows,'name',$row['DName']);
            array_push($rows,'title',$row['title']);
            array_push($rows,'Date',$row['Date']);

        }
        return $rows;

    }

    public function _getSeenNotifications2($DID)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                  WHERE `type`='t' AND `DRseen`='1' AND `DID`='$DID'";
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'pid',$row['PID']);
            array_push($rows,'name',$row['DName']);
            array_push($rows,'title',$row['title']);
            array_push($rows,'Date',$row['Date']);

        }
        return $rows;

    }

    public function _getUnseenNotifications2($DID)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                  WHERE `type`='t' AND `DRseen`='0' AND `DID`='$DID'";
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'pid',$row['PID']);
            array_push($rows,'name',$row['DName']);
            array_push($rows,'title',$row['title']);
            array_push($rows,'Date',$row['Date']);

        }
        return $rows;

    }

    public function _update($notifications,$type)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        for($x = 0; $x < count($notifications);$x=$x+8)
        {
            $title = $notifications[$x+5];
            $date = $notifications[$x+7];

            $query = "SELECT `NID`FROM `notification`
                  WHERE `title`='$title' AND `Date`='$date'";
            $result = $mysqli->query($query);

            $rows= array();
            while($row = $result->fetch_assoc()) {
                $NID = $row['NID'];
            }
            if($type == 'd')
            {
                $sql="UPDATE `notification` SET `DRseen`='1' WHERE `NID`='$NID'";
            }
            else{
                $sql="UPDATE `notification` SET `Pseen`='1' WHERE `NID`='$NID'";
            }

            mysqli_query($mysqli, $sql);
        }
        return true;
    }

}