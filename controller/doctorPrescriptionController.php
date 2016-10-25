<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 3/31/2016
 * Time: 7:24 PM
 */
if($_POST)
{
    if(isset($_POST['submit']))
    {
        $patient = $_POST['patient'];
        $medicine = $_POST['medicine'];
        $freq = $_POST['frequency'];
        $instruction = $_POST['instruction'];
        session_start();
        $ID = $_SESSION['DID'];
        try
        {
            include '../model/prescriptionModel.php';
            $model = new prescriptionModel();
            $result = $model->insertPrescription($ID,$patient,$medicine,$freq,$instruction);
            //header('Location:../view/displayRecord.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}