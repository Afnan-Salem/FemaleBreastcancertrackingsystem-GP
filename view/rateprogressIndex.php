<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 9:06 PM
 */
include_once '../model/ratepatients.php';
$get = new getting();

$pids = $get->_get();
$prate = $get->_getrated();
include_once '../view/rateProgress.php';
$go = new popupform($pids,$prate);