<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/11/2016
 * Time: 10:44 AM
 */
session_start();
class displayRecordModel
{
    public function _getPatientRecord($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `FNAME`, `LNAME`, `BIRTHDATE`, `AGE_AT_DIAGNOSE`, `SUPPORT_CONTACT`,`FAMILY_HISTORY`,
                `GENETIC_TESTING`,`HEALTH_CONCERNS`, `ECHOCARDIOGRAM_`, `COMMENTS`,`SURGERY`, `SENTINEL_NODE_BIOPSY`,
                 `AXILLARY_DISSECTION`
                 FROM `patient`,`record` WHERE `patient`.`PID`='$id' and `record`.`PID`='$id'";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);
        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'FName',$row['FNAME']);
            array_push($rows,'LName',$row['LNAME']);
            array_push($rows,'DOB',$row['BIRTHDATE']);
            array_push($rows,'Age',$row['AGE_AT_DIAGNOSE']);
            array_push($rows,'SupContact',$row['SUPPORT_CONTACT']);
            array_push($rows,'Family',$row['FAMILY_HISTORY']);
            array_push($rows,'Test',$row['GENETIC_TESTING']);
            array_push($rows,'Hconcerns',$row['HEALTH_CONCERNS']);
            array_push($rows,'Echo',$row['ECHOCARDIOGRAM_']);
            array_push($rows,'Comment',$row['COMMENTS']);
            array_push($rows,'Surg',$row['SURGERY']);
            array_push($rows,'Node',$row['SENTINEL_NODE_BIOPSY']);
            array_push($rows,'Diss',$row['AXILLARY_DISSECTION']);
        }
        return $rows;
    }
    public function _getGuestRecord($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `FULL_NAME`, `BIRTH_DATE` FROM `guest` WHERE `GID`='$id'";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);
        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'FName',$row['FULL_NAME']);
            array_push($rows,'DOB',$row['BIRTH_DATE']);
        }
        return $rows;
    }
    public function findDrugs()
    {
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $sql = "SELECT `DRUG_ID` , `NAME` FROM `drugs`";
            mysqli_query($connection_link,"SET NAMES 'utf8'");
            $result = mysqli_query($connection_link,$sql);
            if($result != null)
            {
                $resArr = array(); //create the result array
                while($row = mysqli_fetch_assoc($result))
                { //loop the rows returned from db
                    $resArr[] = $row; //add row to array
                }
                //session_start();
                $_SESSION['drugs']=$resArr;
                return $resArr;
            }
            else
            {
                throw new Exception("error");
            }
        }
        mysqli_close();
    }
	public function get_TaskInfo($id)
	{
		$ID  = $_SESSION['DID'];
		$date = $date=date("Y-m-d");
		$mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `task_ID`,`TITLE`,`FNAME`,`MNAME`,`LNAME` from `tasks`,`patient` WHERE tasks.PID=patient.PID and tasks.PID='$id' and tasks.DID='$ID' and `PROCESS_DATE_Time`='$date'";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);
		if($result !=null)
		{
        $row = $result->fetch_assoc();
		$contentComment =  $row['TITLE'] ." Task of ".$row['FNAME']." " .$row['MNAME']." ". $row['FNAME'] ."is marked complete";
		if (isset($_SESSION['mcon'])) 
			{
                $_SESSION['mcon'] = $contentComment;
				//$_SESSION['TID'] = $row['task_ID'];
            } 
			else 
			{
                $_SESSION['mcon'] = $contentComment;
				//$_SESSION['TID'] = $row['task_ID'];
            }
        }
		return $row['task_ID'];
	}
	public function get_Status($id,$TID)
	{
		$mysqli = new mysqli("localhost", "root", "baheya", "baheya");
		 if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query ="SELECT `FLAG` from `tasks` WHERE tasks.PID='$id' and tasks.task_ID='$TID';";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        $result = $mysqli->query($query);
		if($result !=null)
		{
        $row = $result->fetch_assoc();
        }
		return $row['FLAG'];
	}
}