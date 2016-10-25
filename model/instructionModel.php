<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 4/16/2016
 * Time: 10:01 AM
 */
$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link) {
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    session_start();
    $patient = $_SESSION['patient'];
    $doctor = $_SESSION['DID'];
    $specialist = mysqli_real_escape_string($connection_link, $data->assigned);
    $title = mysqli_real_escape_string($connection_link, $data->title);
    $instruction = mysqli_real_escape_string($connection_link, $data->taskInstruction);

    if(strpos($patient , 'g') !== false) {
        $len = strlen($patient);
        $sub = substr($patient, 2, $len);
        $id = 'p_' . $sub;
        $query = "SELECT `FULL_NAME`, `NUM`, `BIRTH_DATE`, `PHONE`, `ALT_PHONE`
                   FROM `guest` WHERE `GID` = '$patient'";
        $res = $connection_link->query($query);
        $row = $res->fetch_assoc();
        while ($row = $res->fetch_assoc()) {
            array_push($rows,'Name',$row['FULL_NAME']);
            array_push($rows,'num',$row['NUM']);
            array_push($rows,'DOB',$row['BIRTH_DATE']);
            array_push($rows,'phone',$row['PHONE']);
            array_push($rows,'alt',$row['ALT_PHONE']);
        }

        $name = $rows[1];
        $y = strrpos($name," ");
        $fname = substr($name,0,$y);
        $y = strrpos($name," ",$y+1);
        $mname = substr($name,($y+1),$y);
        $y = strrpos($name," ",$y+1);
        $lname = substr($name,($y+1),$y);

        $query2="INSERT INTO `patient`(`PID`, `DID`, `FNAME`, `MNAME`, `LNAME`, `NID`
                , `PASSWORD`, `BIRTHDATE`, `HOME_PHONE`, `CELL_PHONE`,  `prefered`, `archieve`)
                VALUES ('$id','$doctor','$fname','$mname','$lname','{$rows[3]}','$fname'
                ,'{$rows[5]}','{$rows[7]}','{$rows[9]}','0','0')";
        mysqli_query($connection_link, "SET NAMES 'utf8'");
        $res2 = mysqli_query($connection_link, $query2);
        $patient = $id;
    }
	
    include_once '../model/patientReserve.php';
    $obj = new patientReserve();
    $reserveDt = $obj->_reservation($specialist,$title,$patient);
    $processTime = strtotime($reserveDt);
    $date = date("Y-m-d");
    $sql = "INSERT INTO `baheya`.`tasks` (`PID`, `DID`, `STATUS`, `TITLE`,
            `description`, `initiation_date`,`PROCESS_DATE_Time`,`ARCHIVED`)
            VALUES ('" . $patient . "', '" . $specialist . "', '0', '" . $title . "', '" . $instruction . "', '" . $date . "',
            '".date('Y-m-d H:i:s',$processTime)."','0')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    mysqli_query($connection_link, $sql);
	

    $last_id = mysqli_insert_id($connection_link);

    $sql1="INSERT INTO `followers`(`TASK_ID`, `DID`) VALUES ('".$last_id."','".$specialist."')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    mysqli_query($connection_link, $sql1);

    $sql3="INSERT INTO `followers`(`TASK_ID`, `DID`) VALUES ('".$last_id."','".$doctor."')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    mysqli_query($connection_link, $sql3);
	///////////////////////////////////////////////////////////////////////////
	$sql4 ="INSERT INTO `notify_activitylog`(`TOUSER`, `FROMUSER`,`NCONTENT`, `NTYPE`, `status`)
            VALUES ('".$specialist."','".$doctor."','".$title."','TASK','unread')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    mysqli_query($connection_link, $sql4);
	////////////////////////////////////////////////////////////////////////////////
    $sql2 ="INSERT INTO `treats`(`DID`, `PID`) VALUES ('".$specialist."','".$patient."')";
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = mysqli_query($connection_link, $sql2);

    $result = mysqli_affected_rows();

    echo $json_response = json_encode($result);

}