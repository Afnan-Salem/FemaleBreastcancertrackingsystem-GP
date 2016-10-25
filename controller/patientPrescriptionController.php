<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 3/11/2016
 * Time: 4:15 AM
 */
 session_start();
if($_POST)
{
    $id = $_POST['id'];
    echo $id;
    if (isset($_POST['view']))
    {
        try
        {
            include '../model/prescriptionModel.php';
            $model = new prescriptionModel();
            $result = $model->searchPrescriptions($id);
            header('Location:../view/viewPrescriptionPDF.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
else
{
$id = $_GET['id'];
$pid = $_SESSION['patient'];
include '../model/patientName.php';
$model2 = new patientName();
$name = $model2->_getName($pid);
    if($name) {
        $_SESSION['FNAME'] = $name[1];
		$_SESSION['MNAME'] = $name[3];
        $_SESSION['LNAME'] = $name[5];
    }
try
{
    include '../model/prescriptionModel.php';
    $model = new prescriptionModel();
    $result = $model->searchPrescriptions($id);
    header('Location:../view/viewPrescriptionPDF.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
}