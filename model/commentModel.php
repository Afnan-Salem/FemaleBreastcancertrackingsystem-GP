<?php

/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 07/05/2016
 * Time: 01:35 ص
 */
require_once '../includes/config.php';


$query="SELECT c.COMMENT , c.DATE , c.TIME , c.DID FROM `task_comment` c WHERE `taskID` = 9";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}


# JSON-encode the response
echo $json_response = json_encode($arr);

?>