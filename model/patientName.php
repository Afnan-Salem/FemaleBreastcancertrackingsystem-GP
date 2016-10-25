<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/12/2016
 * Time: 11:26 PM
 */
class patientName
{
    public function _getName($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `FNAME`, `MNAME`,`LNAME` FROM `patient` WHERE `PID`='$id'";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);

        $rows= array();
        while($row = $result->fetch_assoc())
        {
            array_push($rows, 'FNAME', $row['FNAME']);
			array_push($rows, 'MNAME', $row['MNAME']);
            array_push($rows, 'LNAME', $row['LNAME']);
        }
        return $rows;
    }

}