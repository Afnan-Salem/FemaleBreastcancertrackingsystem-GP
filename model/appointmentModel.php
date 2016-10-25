<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/4/2016
 * Time: 1:53 PM
 */
class Model
{
    public $DID;
    public $date;
    public $appointment = array();
    public function _construct($DID,$date)
    {
        $this -> DID  = $DID;
        $this -> date = $date;
    }
    // get data from DB
    public function _getAppointments($date,$DID)
    {
        // $appointments = array();
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $query ="SELECT `guest`.`GID`,(`guest`.`FULL_NAME`)as FNAME,`reservations`.`FLAG` FROM `guest`, `reservations`
                WHERE `guest`.`GID`= `reservations`.`GID`  and `reservations`.`FLAG`='g'
                and date(`DATE`) = '$date'
                union
                SELECT `patient`.`PID`,`patient`.`FNAME`,`reservations`.`FLAG` FROM `patient`,`patient_reserve`,`reservations`
                WHERE `patient`.`PID`= `patient_reserve`.`PID` and `reservations`.`FLAG`='p'
                and date(`DATE`) = '$date' and `reservations`.`DID` = '$DID'";
				mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'Flag',$row['FLAG']);
            array_push($rows,'Name',$row['FNAME']);
            array_push($rows,'ID',$row['GID']);
        }
        return $rows;
    }
}
