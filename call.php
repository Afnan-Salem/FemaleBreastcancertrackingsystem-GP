<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 9:06 PM
 */
include_once 'getpatients.php';
$get = new getting();

$pids = $get->_get();
$prate = $get->_getrated();
include_once 'popupform.php';
$go = new popupform($pids,$prate);