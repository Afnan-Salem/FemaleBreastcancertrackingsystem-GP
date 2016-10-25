<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 5/26/2016
 * Time: 8:24 AM
 */
$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    $medicine = mysqli_real_escape_string($connection_link,$data->medicine);
    $query = "SELECT `DRUG_ID` FROM `drugs` WHERE `NAME`='".$medicine."'";
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
