<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 5/1/2016
 * Time: 2:09 PM
 */
session_start();
if (!empty($_POST['Labs']))
{
    $labs = $_POST['Labs'];
    $pid = $_SESSION['patient'];
    $img1='';
    $img2='';
    print_r($labs);
   /* if(count($labs)>2)
    {
        include_once '../view/displayRecord.php';
    }
    elseif(count($labs)<2)
    {
        include_once '../view/displayRecord.php';
    }
    else
    {
        for($x=0;$x<count($labs);$x++)
        {
            $id=$labs[$x];
            include_once '../model/modelCompare.php';
            $modelObj = new modelCompare();
            if($img1 == null)
            {
                $img1 = $modelObj -> _getLabRay($id,$pid);
            }
            else
            {
                $img2 = $modelObj -> _getLabRay($id,$pid);
            }
        }
        if($img1!= null && $img2 !=null)
        {

            echo "<image src=".$img1."height='100' width='100'><br><br>";
            echo "<image src=".$img2."height='100' width='100'><br><br>";

        }
    }*/
}
