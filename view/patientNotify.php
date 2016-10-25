<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/29/2016
 * Time: 12:54 AM
 */


include_once '../model/drugsNotificationsModel.php';
$model = new drugsNotificationsModel();
$result = $model->_getNotifications();

include_once'../view/notifications.php';
$view = new notifications($result);

?>