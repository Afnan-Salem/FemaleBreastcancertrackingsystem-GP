<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/14/2016
 * Time: 12:53 PM
 */
class getlabs2
{
    public function _getLabs($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `TEST_ID`, `SUBJECT`, `FLAG` FROM `tests` WHERE `PID`='$id'";

        $result = $mysqli->query($query);
        $rows= array();
        while($row = $result->fetch_assoc())
        {
            array_push($rows, 'Flag', $row['FLAG']);
            array_push($rows, 'ID', $row['TEST_ID']);
            array_push($rows, 'Subject', $row['SUBJECT']);
        }
        return $rows;
    }


}