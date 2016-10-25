<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 2/25/2016
 * Time: 10:26 PM
 */
session_start();
$data = $_SESSION['username']; //de el session
if($_GET['type'])
{
    if($_GET['type']=='prescription')
    {
        try
        {
            include '../model/prescriptionModel.php';
            $model = new prescriptionModel();
            $_SESSION['prescriptions'] = $model->search($data);
            header('Location:../view/prescriptions.php');
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    else
    {
        $type = $_GET['type'];
        try
        {
            include '../model/lab-raysModel.php';
            $model = new model();
            $result = $model->search($data,$type);
            header('Location:../view/'.$type.'.php');

        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}