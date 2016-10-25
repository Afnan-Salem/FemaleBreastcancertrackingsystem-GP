<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 2/26/2016
 * Time: 11:28 AM
 */

include_once("../controller/tableController.php");
$controller = new tableController();
$date = $date=date("Y-m-d");
session_start();
$ID  = $_SESSION['DID'];
$controller-> _getDailyAppointments($date,$ID);

?>