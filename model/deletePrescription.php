<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 5/19/2016
 * Time: 7:29 PM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
        $ID = $_GET['ID'];
        $drugID = $_GET['med'];
        $freq = $_GET['freq'];
        $ins = $_GET['inst'];
//        $query = "INSERT INTO `tahanytemp`(`ID`, `medicine`, `freq`, `inst`) VALUES ('".$ID."','".$drugID."','".$freq."','".$ins."')";
        $query = "DELETE FROM `contain` WHERE `PRESID` = '".$ID."' and `DRUG_ID` ='".$drugID."'";
        $result = $connection_link->query($query) or die($connection_link->error . __LINE__);
        $result =  $connection_link->affected_rows;
        if($result >0)
        {
            $sql = "SELECT * FROM `contain` WHERE `PRESID` = '".$ID."'";
            $res = $connection_link->query($sql) or die($connection_link->error . __LINE__);
            if( $res->num_rows == 0)
            {
                $sql2 = "DELETE FROM `prescribtion` WHERE `PRESID` = '".$ID."'";
                $res2 = $connection_link->query($sql2) or die($connection_link->error . __LINE__);
                $res2 = $connection_link->affected_rows;
                echo $json_response = json_encode($res2);
            }
        }
# JSON-encode the response
//        echo $json_response = json_encode($res2);
    }
?>
