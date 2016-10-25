<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/20/2016
 * Time: 4:14 AM
 */

class drugsNotificationsModel
{
    public function search()
    {
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            session_start();
            $user = $_SESSION['username'];
            $sql = "SELECT `PRESID` , `INITIATION_DATE` FROM `prescribtion` WHERE `PID`='".$user."' ORDER BY `INITIATION_DATE` DESC limit 1 ";
            mysqli_query($connection_link,"SET NAMES 'utf8'");
            $result = mysqli_query($connection_link,$sql);
            $row = $result->fetch_assoc();
            $pID = $row['PRESID'];
            $sql = "SELECT drugs.NAME,`time`,`description` FROM `prescriptionnotifications` INNER JOIN drugs on
                        drugs.DRUG_ID=prescriptionnotifications.Drug and `prescID`= '".$pID."'";
            mysqli_query($connection_link,"SET NAMES 'utf8'");
            $result = mysqli_query($connection_link,$sql);
            $resArr = array(); //create the result array
            while ($r = mysqli_fetch_assoc($result)) { //loop the rows returned from db
                $resArr[] = $r; //add row to array
            }
            $_SESSION['drugsNotifications'] = $resArr;
            return $resArr;
        }
        mysqli_close();
    }

    public function _getNotifications()
    {
        session_start();
        $id = $_SESSION['username'];
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $query = "SELECT DISTINCT `PID`, `DName`, `title`, `Date` FROM `notification`
                      WHERE `Pseen`='0' AND `PID`='$id'";
            $result = $connection_link->query($query);

            $rows= array();
            while($row = $result->fetch_assoc()) {
                array_push($rows,'pid',$row['PID']);
                array_push($rows,'name',$row['DName']);
                array_push($rows,'title',$row['title']);
                array_push($rows,'Date',$row['Date']);
            }
            return $rows;

        }
    }
}