<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/19/2016
 * Time: 2:13 PM
 */
session_start();

include_once '../model/modelLabsRays.php';
$pid = $_SESSION['patient'];
$id = $_GET['id'];
$controller = new modelLabsRays();
$controller->_view($id,$pid);
?>