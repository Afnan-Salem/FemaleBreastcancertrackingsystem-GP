<?php
//session_start();
class taskModel


{
    public $k;
    function __construct()
    {
        //$this->_gettask();
       // $this->getdata();
    }

     function _gettask($patient_idd)
    {
	
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
$type = $_SESSION['TYPE'];
       // $patient_idd=1;
		$query1="";
		//echo $patient_idd;
        //echo $patient_idd;
       // echo $_SESSION['DID'];
if($type ==  "c"|| $type == "C"){
        $query1 ="select `task_ID`,`DID`,`STATUS`,`TITLE`,DATE(`PROCESS_DATE_Time`)AS PROCESS_DATE_Time,`description`,`initiation_date`,`FLAG`from
		`tasks` WHERE `PID`= '".$patient_idd."'";}/*and task_ID not in (select TASK_ID from 
		archive_task where DID='".$_SESSION['DID']."')*/

		if($type =="s"|| $type == "S"){
       $query1 ="select `task_ID`,`DID`,`STATUS`,`TITLE`,DATE(`PROCESS_DATE_Time`)AS PROCESS_DATE_Time,`description`,`initiation_date`,`FLAG`
	   from `tasks` WHERE `PID`= '".$patient_idd."'and task_ID not in (select TASK_ID from 
		archive_task where DID='".$_SESSION['DID']."')";}
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        global $res2;
		global $res;
        $result = $mysqli->query($query1);
        $res2 = $mysqli->query($query1);
		$res= $mysqli->query($query1);
     /*     if ($result->num_rows > 0)
        {
            // output data of each row
            while($row = $result->fetch_assoc())

            {
                echo "<br> DID: ". $row["DID"]. " - TITLE: ". $row["TITLE"]. " - DESCRIPTION: ". $row["description"]. "  - initiation_date: ". $row["initiation_date"]. "<br>";
            }
        }
        else
        {
            echo "0 results";
        }
*/
     $rows = array();
        if($result == null)
        {

        }
        else {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, 'task_ID', $row['task_ID']);
                array_push($rows, 'DID', $row['DID']);
                array_push($rows, 'STATUS', $row['STATUS']);
                array_push($rows, 'TITLE', $row['TITLE']);
                array_push($rows, 'description', $row['description']);
                array_push($rows, 'initiation_date', $row['initiation_date']);
				array_push($rows, 'FLAG', $row['FLAG']);
				array_push($rows, 'dueDate', $row['PROCESS_DATE_Time']);
            }
        }

     /*$length = count($rows);
        for ($i = 0; $i < $length; $i++) {
            print $rows[$i];

        }*/
        return $rows;
    }

     function getdata($patient_idd)
    {
        $rows2 = array();
		$followrs=array();
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno)
        {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        global $res2;
        while($row1 = mysqli_fetch_array($res2))
        {
            $k = $row1['DID'] ;
			//$TID=$row1['DID'];
            $query = "SELECT DISTINCT(`NAME`)FROM `doctor` WHERE `DID`='".$k."'";
            $sql   = $mysqli->query($query);

            while ($rows1 = $sql->fetch_assoc())
            {
                array_push($rows2, 'NAME', $rows1['NAME']);

            }
			
			
        }

/*       $length = count($rows2);
        for ($i = 0; $i < $length; $i++)
        {
            echo "     ";
            print $rows2[$i];

        }*/
return $rows2;
    }

function getfollower($patient_idd)
{
//session_start();
$followrs=array();
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno)
        {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
     
		global $res;
        while($row1 = mysqli_fetch_array($res))
        {
            $k = $row1['DID'] ;
			//$TID=$row1['DID'];
			$TID=$row1['task_ID'];
			//print $TID;
            $query = "SELECT * from followers where DID='".$_SESSION['DID']."' and TASK_ID='".$TID."' ";
            $sql   = $mysqli->query($query);

            while ($rows1 = $sql->fetch_assoc())
            {
			$followrs[] = $rows1;	
               // print $

            }
			
			
        }
/*       $length = count($rows2);
        for ($i = 0; $i < $length; $i++)
        {
            echo "     ";
            print $rows2[$i];

        }*/
return $followrs;
}
function getpatient($patient_idd)
{
    //$patient_id=1;



    $conn = new mysqli("localhost", "root", "baheya", "baheya");
    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }

    $query1 ="select `FNAME`,`MNAME`,`LNAME`,`BIRTHDATE`,`DID` from patient where `PID`='".$patient_idd."'";

    mysqli_query($conn,"SET NAMES 'utf8'");

    //$result = $mysqli->query($query1);
		$result = mysqli_query($conn, $query1);
    $rows3 = array();

    while ($row2 = $result->fetch_assoc()) {
	array_push($rows3, 'FNAME', $row2['FNAME']);
        array_push($rows3, 'MNAME', $row2['MNAME']);
        array_push($rows3, 'LNAME', $row2['LNAME']);
        array_push($rows3, 'BIRTHDATE', $row2['BIRTHDATE']);
        array_push($rows3, 'DID', $row2['DID']);

    }

    //$length = count($rows3);
       /*for ($i = 0; $i < $length; $i++) {
           print $rows3[$i];
           print "  ";

       }*/
    return $rows3;
 // $_SESSION['pinfo']=$rows;

}
 public function _getDueDate($patient_idd)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

       // $patient_idd=1;
$did =$_SESSION['DID'];
        $query ="select `task_ID`,`STATUS`,DATE(`PROCESS_DATE_Time`)AS PROCESS_DATE_Time,DATE_FORMAT(`PROCESS_DATE_Time`,'%H:%i:%s') PROCESS_Time
                  from `tasks`
                  WHERE `PID`= '$patient_idd' and task_ID not in
                  (select TASK_ID from archive_task where DID='$did')";
        mysqli_query($mysqli,"SET NAMES 'utf8'");
        global $res2;
        $result = $mysqli->query($query);
        $res2 = $mysqli->query($query);

        $rows = array();
        if($result == null)
        {

        }
        else {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, 'task_ID', $row['task_ID']);
                array_push($rows, 'STATUS', $row['STATUS']);
                array_push($rows, 'dueDate', $row['PROCESS_DATE_Time']);
                array_push($rows, 'time', $row['PROCESS_Time']);
            }
        }
        return $rows;
    }

}
?>
