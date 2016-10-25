<?php
//require_once '../includes/db.php'; // The mysql database connection script
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = 'baheya';
$DB_NAME = 'baheya';
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
    session_start();
    $patient = $_SESSION['patient'];
    $doctor = $_SESSION['DID'];
    $date = date("Y-m-d");
    $query = "SELECT contain.`PRESID`,drugs.NAME ,contain.`FREQUENCY`,contain.`INSTRUCTIONS`,drugs.Drug_ID from drugs inner join contain on
                    contain.`DRUG_ID` = drugs.DRUG_ID and contain.`PRESID` in(SELECT `PRESID` FROM `prescribtion`
                    WHERE `DID`='" . $doctor . "' and `PID` = '" . $patient . "' and `INITIATION_DATE`='" . $date . "')";
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