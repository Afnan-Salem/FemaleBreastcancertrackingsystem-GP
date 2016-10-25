<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/28/2016
 * Time: 11:36 PM
 */
class drNotify
{
    public function _construct($DID)
    {
        $type = 'd';
        include_once '../model/drNotificationModel.php';
        $model = new drNotificationModel();
        $result = $model->_getUnseenNotifications($DID);
        $result2 = $model->_getUnseenNotifications2($DID);
        $total = count($result)+count($result2);
        return $total;

    }

}