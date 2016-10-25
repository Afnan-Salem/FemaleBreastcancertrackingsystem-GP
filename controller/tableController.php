<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 24/02/2016
 * Time: 10:54 م
 */

class tableController
{
    // ha5od mn el session el DID
    // ha3ml function bta5od el DID w twdeh ll model
    public $DID ;
    public $date;
    // public $appointments = array();

    public function _construct($DID,$date)
    {
        $this -> DID  = $DID;
        $this -> date = $date;
    }

    public function  _getDailyAppointments($date,$DID)
    {
        //hab3t el DID ll model
        include '../model/appointmentModel.php';
        $modelObj = new Model();
        $appointments = $modelObj -> _getAppointments($date,$DID);
//        if($appointments != null )
//        {
            include_once '../view/table.php';
            $viewObj = new tableView($appointments);

//        }
//        else
//        {
//            echo 'false';
//        }
    }
}