<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 2/25/2016
 * Time: 10:34 PM
 */
class model
{
   public function search($user,$type)
    {
        if($type=='labs')
            $flag='l';
        else if($type=='rays')
            $flag='r';
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $sql = "SELECT `TEST_ID`,`DATE`,`SUBJECT` FROM `tests` WHERE `FLAG`='".$flag."'and `PID` ='".$user."' ORDER BY `DATE` DESC ";
            $result = mysqli_query($connection_link,$sql);
//            if($result != null)
//            {
                $resArr = array(); //create the result array
                while($row = mysqli_fetch_assoc($result))
                { //loop the rows returned from db
                    $resArr[] = $row; //add row to array

                }
                $_SESSION['results']= $resArr;
                return $resArr;
//            }
//            else
//            {
//                throw new Exception("error");
//            }
        }
        mysqli_close();
    }
    public function download($id)
    {
        $connection_link = mysqli_connect("127.0.0.1","root","baheya","baheya");
        if(!$connection_link)
        {
            throw new Exception(" Connection Failed" . mysqli_error());
        }
        else
        {
            $sql = "SELECT `ATTACHEMENT`FROM `tests` WHERE `TEST_ID`='".$id."'";
            $result = mysqli_query($connection_link,$sql);
            if($result != null)
            {
                while($row = mysqli_fetch_assoc($result))
                { //loop the rows returned from db
                    //$name = 'image.jpg';
                    header("Content-type: image/jpeg");
                    header("Content-Disposition: attachment; filename='imge.jpg'");
                    header("Content-Description: PHP Generated Data");
                    echo $row['ATTACHEMENT'];
                }
            }
            else
            {
                throw new Exception("error");
            }
        }
    }
}