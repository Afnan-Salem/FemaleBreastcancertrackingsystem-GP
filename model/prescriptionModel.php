<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 3/9/2016
 * Time: 9:55 AM
 */
class prescriptionModel
{
    public function search($user)
    {
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $sql = "SELECT `PRESID` , `INITIATION_DATE` FROM `prescribtion` WHERE `PID`='".$user."' ORDER BY `INITIATION_DATE` DESC ";
            $result = mysqli_query($connection_link,$sql);
            if($result != null)
            {
                $resArr = array(); //create the result array
                while($row = mysqli_fetch_assoc($result))
                { //loop the rows returned from db
                    $resArr[] = $row; //add row to array
                }
                session_start();
                $_SESSION['prescriptions']=$resArr;
                return $resArr;
            }
            else
            {
                throw new Exception("error");
            }
        }
        mysqli_close();
    }
    public function searchPrescriptions($id)
    {
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $sql = "SELECT drugs.NAME ,contain.`FREQUENCY`,contain.`INSTRUCTIONS` from drugs inner join contain on
                    contain.`DRUG_ID` = drugs.DRUG_ID and contain.`PRESID`='".$id."'";
            mysqli_query($connection_link,"SET NAMES 'utf8'");
            $result = mysqli_query($connection_link,$sql);
            if($result != null)
            {
                $resArr = array(); //create the result array
                while($row = mysqli_fetch_assoc($result))
                { //loop the rows returned from db
                    $resArr[] = $row; //add row to array
                }
                session_start();
                $_SESSION['prescription']=$resArr;
                return $resArr;
            }
            else
            {
                throw new Exception("error");
            }
        }
        mysqli_close();
    }
}