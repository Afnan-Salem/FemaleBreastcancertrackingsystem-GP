<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/11/2016
 * Time: 12:50 PM
 */
class displayRecordCont
{
    public function _construct1($id)
    {
        $this->_getPatientRecord($id);
    }
    public function _getPatientRecord($id)
    {
        if(strpos($id , 'g') !== false)
        {
            include '../model/displayRecordModel.php';
            $modelObj = new displayRecordModel();
            $record = $modelObj -> _getGuestRecord($id);
			$TID = $modelObj -> get_TaskInfo($id);
			$circle=$modelObj -> get_Status($id,$TID);
			if (isset($_SESSION['TID'],$_SESSION['circle'])) 
			{
                $_SESSION['TID'] = $TID ;
				$_SESSION['circle'] = $circle;
            } 
			else 
			{
                $_SESSION['TID'] = $TID ;
				$_SESSION['circle'] = $circle;
            }
			
            if($record != null)
            {
				$modelObj->findDrugs();
				if($_SESSION['TYPE'] == 'c')
				{
					include_once '../view/displayConsultantRecord.php';
				}
                else
				{
					include_once '../view/displaySpecialistRecord.php';
				}    
                $viewObj = new displayRecord($record);
            }
            else
            {
                include_once("../controller/tableController.php");
                $controller = new tableController();
                $date = $date=date("Y-m-d");
                $DID  = $_SESSION['DID'];
                $controller-> _getDailyAppointments($date,$DID);
            }
        }
        else
        {
            include '../model/displayRecordModel.php';
            $modelObj = new displayRecordModel();
            $record = $modelObj -> _getPatientRecord($id);
			$TID = $modelObj -> get_TaskInfo($id);
			$circle=$modelObj -> get_Status($id,$TID);
			if (isset($_SESSION['TID'],$_SESSION['circle'])) 
			{
                $_SESSION['TID'] = $TID ;
				$_SESSION['circle'] = $circle;
            } 
			else 
			{
                $_SESSION['TID'] = $TID ;
				$_SESSION['circle'] = $circle;
            }
            if($record != null )
            {
                $modelObj->findDrugs();
                if($_SESSION['TYPE'] == 'c')
				{
					include_once '../view/displayConsultantRecord.php';
				}
                else
				{
					include_once '../view/displaySpecialistRecord.php';
				}    
                $viewObj = new displayRecord($record);
            }
            else
            {
                include_once("../controller/tableController.php");
                $controller = new tableController();
                $date = $date = date("Y-m-d");
                $DID = $_SESSION['DID'];
                $controller->_getDailyAppointments($date, $DID);
            }
        }
    }
    public function _getLabs($id)
    {
        include '../model/getlabs2.php';
        $modelObj2 = new getlabs2();
        $record = $modelObj2 -> _getLabs($id);
        if($record != null ) {
            return $record;
        }
        else
        {
            return false;
        }

    }
    public function _getPrescribtion($id)
    {
        include '../model/getprescriptions.php';
        $modelObj1 = new getprescriptions();
        $pres = $modelObj1 -> _getPrescribtion($id);
        if($pres != null ) {
            return $pres;
        }
        else
        {
            return false;
        }

    }

}