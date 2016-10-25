<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/12/2016
 * Time: 10:51 PM
 */
class getprescriptions
{
    public function _getPrescribtion($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `PRESID`, `INITIATION_DATE` FROM `prescribtion` WHERE `PID`='$id'";

        $result = $mysqli->query($query);
        $rows= array();
        while($row = $result->fetch_assoc())
        {
            array_push($rows, 'ID', $row['PRESID']);
            array_push($rows, 'Date', $row['INITIATION_DATE']);
        }
        return $rows;
    }

}