<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 5/26/2016
 * Time: 9:19 AM
 */
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
    session_start();
    $patient = $_SESSION['patient'];
    $date = date("Y-m-d");

    $query = "SELECT tasks.`task_ID`,tasks.`TITLE`,tasks.`description`, doctor.`NAME` ,doctor.`DID` FROM `tasks` inner join doctor
                on doctor.`DID`=tasks.`DID` and tasks.`initiation_date`='".$date."' and tasks.`PID`='".$patient."'";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = $connection_link->query($query) or die($connection_link->error . __LINE__);

    $arr = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
    }
# JSON-encode the response
    echo $json_response = json_encode($arr);
}
?>