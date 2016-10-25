<?php
session_start();

/*class taskcontroller
{

    public function  _gettasks()
    {*///echo "22222";
//$pid=$_GET['pid'];
include "../model/taskModel.php";
        $modelObj = new taskModel();
        $patientID=$_GET['patientID'];
        
        $archive = $modelObj ->_delete($patientID);
        $row1 = $modelObj -> _gettask($patientID);
        $row2 = $modelObj -> getdata($patientID);
        $row3=$modelObj ->getpatient($patientID);
		$row4 = $modelObj->_getDueDate($patientID);
		$row5=$modelObj->getfollower($patientID);
        if($row2 != null )
        {//echo "here";
            include_once "../view/task.php";
            $viewObj = new task($row2,$row1,$row3,$row4,$row5);
        }
        else
        {
            echo 'false';
        }
    //}
//}