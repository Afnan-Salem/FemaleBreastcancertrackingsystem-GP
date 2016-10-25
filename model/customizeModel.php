<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 5/24/2016
 * Time: 12:15 PM
 */
class customizeModel
{
    public function _getDrDatesModel($id)
    {
        $mysqli =mysqli_connect("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query  = "SELECT distinct `is_available`.`SLOT`,`is_available`.`Day`,`working_slots`.`START_TIME`,`working_slots`.`END_TIME`
                   FROM `working_slots`,`is_available` WHERE `is_available`.`DID`= '$id'
                   and `is_available`.`SLOT`= `working_slots`.`SLOT` ORDER BY `is_available`.`SLOT`";
        $result = $mysqli->query($query);


        $rows= array();
        while($row = $result->fetch_assoc()) {
            array_push($rows,'Day',$row['Day']);
            array_push($rows,'Slot',$row['SLOT']);
            array_push($rows,'Start',$row['START_TIME']);
            array_push($rows,'End',$row['END_TIME']);
        }
        return $rows;
    }
	public function getDrListModel($id)
    {
        $mysqli = mysqli_connect("localhost", "root", "baheya", "baheya");
		if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
		$query="select metting.MID,Title,Department, DATE_FORMAT(Date,'%H:%i:%s') TIMEONLY,Date from metting , dr_metting,
		doctor where Date(metting.Date)=CURDATE() 
		and metting.MID=dr_metting.MID and dr_metting.DID='$id' and doctor.DID='$id' and
		(doctor.DEPARTEMENT=metting.Department or metting.Department='general')";
		$result = $mysqli->query($query);
		
		        $drlist= array();
        while($row = $result->fetch_assoc()) {
           $drlist[]=$row;
        }
        return $drlist;
		
		}
		public function getDrSListModel($id)
    {
        $mysqli = mysqli_connect("localhost", "root", "baheya", "baheya");
		if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
		$query="SELECT surgery.Description,DATE_FORMAT(Date,'%H:%i:%s') TIMEONLY,`Date`FROM `surgery`,
		dr_surgery WHERE DID='$id' and Date(surgery.Date)=CURDATE() and surgery.SID=dr_surgery.SID";
		$result = $mysqli->query($query);
		
		        $drslist= array();
        while($row = $result->fetch_assoc()) {
           $drslist[]=$row;
        }
        return $drslist;
		
		}

}