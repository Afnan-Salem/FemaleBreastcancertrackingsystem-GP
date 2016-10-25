<?php

/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 16/06/2016
 * Time: 07:01 ??
 */
class activitylogModel
{
    private $DID;

    function __construct($DID)
    {
        //set data
        $this->setNotificationsData($DID);

        $this->getNotificationsData();
    }

    private function setNotificationsData($DID)
    {
        $this->DID = $DID;

    }



    function getNotificationsData()
    {

        $conn = mysqli_connect("localhost", "root", "baheya", "baheya");
        // Check connection

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
            $sql = "SELECT `NCONTENT` , `NAME` , `TIMEDATE` FROM `notify_activitylog` , `doctor` WHERE `FROMUSER` = `DID` AND `TOUSER` ='$this->DID' AND `NTYPE` = 'TASK' ORDER BY `TIMEDATE` DESC";

            $result = mysqli_query($conn, $sql);
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;

            }

        $_SESSION['activitylogSessiontask']=$rows;

        $sql2 = "SELECT `NCONTENT` , `NAME` , `TIMEDATE` FROM `notify_activitylog` , `doctor` WHERE `FROMUSER` = `DID` AND `TOUSER` ='$this->DID' AND `NTYPE` = 'COMMENT' ORDER BY `TIMEDATE` DESC";

        $result2 = mysqli_query($conn, $sql2);
        $rows2 = array();
        while ($row2 = $result2->fetch_assoc()) {
            $rows2[] = $row2;

        }

        $_SESSION['activitylogSessioncomment']=$rows2;

    }
}
?>