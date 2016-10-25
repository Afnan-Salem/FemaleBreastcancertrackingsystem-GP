<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/11/2016
 * Time: 12:50 PM
 */

include_once("../controller/displayRecordCont.php");
$id = $_GET['id'];
$controller = new displayRecordCont();
$controller->_construct1($id);

?>