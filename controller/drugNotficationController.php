<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/20/2016
 * Time: 4:13 AM
 */
try
{
    session_start();
    include '../model/drugsNotificationsModel.php';
    $model = new drugsNotificationsModel();
    $result = $model->search();
    $_SESSION['drugsNotifications'] = $result;
    header('Location:../view/DrugsNotifications.php');
} catch (Exception $e) {
    echo $e->getMessage();
}