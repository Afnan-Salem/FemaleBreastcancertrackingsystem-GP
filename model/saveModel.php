<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/12/2016
 * Time: 4:44 PM
 */
class saveModel
{
    public function _getLinks($id)
    {
        $mysqli = mysqli_connect("localhost", "root", "baheya", "baheya");
        if (!$mysqli)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else {

            $sql2 = "SELECT `Links` FROM `savedlinks` WHERE `DID`='$id'";
            $result = $mysqli->query($sql2);
            $rows = array();
            if (!$result) {
                echo "There isn't any links.";
            }
            while ($row = $result->fetch_assoc()) {
                array_push($rows, 'link', $row['Links']);
            }
            return $rows;
        }
    }

}