<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/28/2016
 * Time: 12:55 AM
 */
class notifyTaskModel
{
    public function _insertTaskNotification($TID, $PID, $DID, $title, $Date, $time)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $name = $this->_getDRName($DID);

        $sql = "SELECT DISTINCT `title`, `Date` FROM `notification`";
        $result =$mysqli->query($sql);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'title',$row['title']);
            array_push($rows,'date',$row['Date']);
        }
        $check = true;
        for($x = 0; $x<count($rows);$x= $x + 4)
        {
            //echo $x;
            if($rows [$x+1] == $title && $rows[$x+3] == $Date)
            {
               // echo 'x-->'.$x.' ti-->'.$rows[$x+1].' date-->'.$rows[$x+3];
                $x=$x+4;
            }
            elseif($rows[$x+1] != $title && $rows[$x+3] != $Date)
            {
             //echo 'x-->'.$x.' ti-->'.$rows[$x+1].' date-->'.$rows[$x+3];
                $x=$x+4;
                $check = false;
            }
            else
            {

            }
        }
        if($check == false)
        {
            $query = "INSERT INTO `notification`(`PID`, `DID`, `DName`, `title`, `Date`, `time`, `type`, `DRseen`,`Pseen`) VALUES
                  ('$PID','$DID','$name','$title','$Date','$time','t','0','0')";

            $res = mysqli_query($mysqli, $query);
        }
        return true;
    }

    public function _insertNewReservation($TID, $PID, $DID, $title)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        include_once '../model/patientReserve.php';
        $obj = new patientReserve();
        $reserveDt = $obj->_reservation($DID, $title, $PID);
        $newProcessTime = strtotime($reserveDt);

        $query = "UPDATE `tasks` SET `PROCESS_DATE_Time`='" . date('Y-m-d H:i:s', $newProcessTime) . "' WHERE `task_ID`='$TID'";
        $res = mysqli_query($mysqli, $query);

        $query2 = "select DATE (`PROCESS_DATE_Time`)AS PROCESS_Date,DATE_FORMAT(`PROCESS_DATE_Time`,'%H:%i:%s') PROCESS_Time
                  from `tasks` WHERE `task_ID`='$TID'";
        $q2res = $mysqli->query($query2);
        while ($q2row = mysqli_fetch_assoc($q2res)) {
            $Date = $q2row['PROCESS_Date'];
            $time = $q2row['PROCESS_Time'];
        }

        $name = $this->_getDRName($DID);

        $query = "INSERT INTO `notification`(`PID`, `DID`, `DName`, `title`, `Date`, `time`, `type`, `DRseen`,`Pseen`) VALUES
                  ('$PID','$DID','$name','$title','$Date','$time','r','0','0')";

        $res = mysqli_query($mysqli, $query);
        return true;

        return true;


    }

    public function _insertDangerNotification($TID,$pid,$Dtype)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $sql = "SELECT `TITLE`,DATE (`PROCESS_DATE_Time`)AS PROCESS_Date,DATE_FORMAT(`PROCESS_DATE_Time`,'%H:%i:%s') PROCESS_Time
                FROM `tasks` WHERE `task_ID`='$TID'";
        $result = $mysqli->query($sql);

        while($row = $result->fetch_assoc())
        {
            $title = $row['TITLE'];
            $Date = $row['PROCESS_Date'];
            $time = $row['PROCESS_Time'];
        }

        $sql2 = "SELECT `DID` FROM `patient` WHERE `PID`='$pid'";
        $result2 = $mysqli->query($sql2);

        while($row2 = $result2->fetch_assoc())
        {
            $did = $row2['DID'];
        }

        $name = $this->_getDRName($did);

        $insert = "INSERT INTO `notification`(`PID`, `DID`, `DName`, `title`, `Date`, `time`, `type`, `DRseen`, `Pseen`)
                   VALUES ('$pid','$did','$name','$title','$Date','$time','d','0','3')";
        mysqli_query($mysqli, "SET NAMES 'utf8'");
        $result2 = mysqli_query($mysqli, $insert);

        return true;

    }

    public function _getDRName($DID)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query4 = "SELECT `NAME` FROM `doctor` WHERE `DID`='$DID'";
        $q4res = $mysqli->query($query4);
        while ($q4row = mysqli_fetch_assoc($q4res)) {
            $name = $q4row['NAME'];
        }
        return $name;
    }

}