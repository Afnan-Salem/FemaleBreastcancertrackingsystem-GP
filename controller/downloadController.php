<?php

$id = $_POST['id'];
include '../model/lab-raysModel.php';
$model = new model();
$model->download($id);