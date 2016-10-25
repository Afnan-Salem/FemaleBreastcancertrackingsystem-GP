<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 5/1/2016
 * Time: 2:13 PM
 */
class modelCompare
{
    public function _getLabRay($id, $pid)
    {

        $conn = mysqli_connect("localhost", "root", "baheya", "baheya");
        if (!$conn) {
            printf("Connect failed \n");
            exit();
        }
        $rs = mysqli_query($conn, "SELECT * FROM `tests` WHERE `TEST_ID`='$id' and `PID`= '$pid'");
        while ($row = mysqli_fetch_array($rs)) {
            return $row['TestPath'];
        }
    }

    public function _getLabsRays($pid)
    {

        $conn = mysqli_connect("localhost", "root", "baheya", "baheya");
        if (!$conn) {
            printf("Connect failed \n");
            exit();
        }
        $rs = mysqli_query($conn, "SELECT * FROM `tests` WHERE `PID`= '$pid'");
        $rows = array();
        while ($row = mysqli_fetch_array($rs)) {
            array_push($rows,'TID',$row['TEST_ID']);
            array_push($rows,'TPath',$row['TestPath']);
        }
        return $rows;
    }
}
