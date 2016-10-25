<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/28/2016
 * Time: 9:30 PM
 */
session_start();

        $DID = $_SESSION['DID'];
        $Dtype = $_SESSION['TYPE'];
        include_once '../model/drNotificationModel.php';
        $model = new drNotificationModel();
        $seen = $model->_getSeenNotifications($DID);
        $unseen = $model->_getUnseenNotifications($DID);
$unseen2 = 0; $seen2 = 0;
        if($Dtype == 'c' || $Dtype == 'C') {
                $unseen2 = $model->_getUnseenNotifications2($DID);
                $seen2 = $model->_getSeenNotifications2($DID);
        }

        include_once '../view/drNotifications.php';
        $view = new  drNotifications($seen,$unseen,$seen2,$unseen2);
