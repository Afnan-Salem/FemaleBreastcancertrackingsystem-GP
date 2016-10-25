<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/21/2016
 * Time: 8:03 AM
 */
class modelLabsRays
{
    public function _view($id)
    {
        echo 'model';
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `ATTACHEMENT` FROM `tests` WHERE `TEST_ID`='$id'";
        $result = $mysqli->query($query);
        if($result != null)
        {
            $row = mysqli_fetch_assoc($result);
            header("Content-type: image/jpg");
            echo $row['ATTACHEMENT'];
        }

    }

}