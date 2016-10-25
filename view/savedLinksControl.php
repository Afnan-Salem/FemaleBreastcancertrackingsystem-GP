<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/12/2016
 * Time: 4:43 PM
 */
session_start();

$id = $_SESSION['DID'];
include '../model/saveModel.php';
$modelObj = new saveModel();
$links = $modelObj -> _getLinks($id);
include_once("../view/savedLinks.php");
$view = new savedLinks();
$view-> _getLinks($links);
?>