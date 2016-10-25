<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 5/24/2016
 * Time: 12:15 PM
 */
session_start();

$id  = $_SESSION['DID'];

include_once '../model/customizeModel.php';
$model = new customizeModel();
$drdates = $model-> _getDrDatesModel($id);
$drMTList=$model->getDrListModel($id);
$drSTList=$model->getDrSListModel($id);

$date=date("Y-m-d");
$day = date('l', strtotime($date));
$days = array();/*
if($drdates != null)
{*/
    include_once '../view/Dashboardlist2.php';
    $view = new Dashboard($drdates,$drMTList,$drSTList);


?>