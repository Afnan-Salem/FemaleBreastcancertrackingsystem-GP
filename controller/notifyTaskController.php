<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/28/2016
 * Time: 12:54 AM
 */
class notifyTaskController
{
    public function _notifyTask($TID,$PID,$DID,$title,$Date,$time)
    {
        include_once '../model/notifyTaskModel.php';
        $notify = new notifyTaskModel();
        $result = $notify->_insertTaskNotification($TID,$PID,$DID,$title,$Date,$time);
        if($result == true)
        {
            return true;
        }
    }

    public function _notifyNewReservation($TID,$PID,$DID,$title)
    {
        include_once '../model/notifyTaskModel.php';
        $notify = new notifyTaskModel();
        $result = $notify->_insertNewReservation($TID,$PID,$DID,$title);
        if($result == true)
        {

            return true;
        }

    }

}